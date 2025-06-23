<?php

namespace Modules\BasicPayment\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankInformationRequest;
use App\Jobs\DefaultMailJob;
use App\Mail\DefaultMail;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\WorkoutEnrollment;
use App\Services\EnrollmentService;
use App\Services\MemberService;
use App\Traits\GetGlobalInformationTrait;
use App\Traits\MailSenderTrait;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\BasicPayment\app\Enums\BasicPaymentSupportedCurrencyListEnum;
use Modules\BasicPayment\app\Http\Controllers\FrontPaymentController;
use Modules\Coupon\app\Models\Coupon;
use Modules\Coupon\app\Models\CouponHistory;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Services\OrderService;
use Modules\Subscription\app\Models\SubscriptionHistory;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    use GetGlobalInformationTrait, MailSenderTrait;
    private $paymentService;
    protected $orderService;
    protected $enrollmentService;
    protected $memberService;
    function __construct(OrderService $orderService, EnrollmentService $enrollmentService, MemberService $memberService)
    {
        $this->paymentService = app(\Modules\BasicPayment\app\Services\PaymentMethodService::class);
        $this->middleware(function (Request $request, Closure $next) {
            if (session()->has('payment_for')) {
                return $next($request);
            }
            return redirect()->back()->with(['message' => __('Not Found!'), 'alert-type' => 'error']);
        });
        $this->orderService = $orderService;
        $this->enrollmentService = $enrollmentService;
        $this->memberService = $memberService;
    }
    function placeOrder($method)
    {
        $user = userAuth();
        $activeGateways = array_keys($this->paymentService->getActiveGatewaysWithDetails());
        if (!in_array($method, $activeGateways)) {
            return response()->json(['status' => false, 'message' => __('The selected payment method is now inactive.')]);
        }
        if (!$this->paymentService->isCurrencySupported($method)) {
            $supportedCurrencies = $this->paymentService->getSupportedCurrencies($method);
            return response()->json(['status' => false, 'message' => __('You are trying to use unsupported currency'), 'supportCurrency' => sprintf(
                '%s %s: %s',
                strtoupper($method),
                __('supports only these types of currencies'),
                implode(', ', $supportedCurrencies)
            )]);
        }

        try {
            $payable_amount = Session::get('total_amount');
            $calculatePayableCharge = $this->paymentService->getPayableAmount($method, $payable_amount);

            DB::beginTransaction();

            $paid_amount = $calculatePayableCharge?->payable_amount + $calculatePayableCharge?->gateway_charge;

            if (in_array($method, ['Razorpay', 'Stripe'])) {
                $allCurrencyCodes = BasicPaymentSupportedCurrencyListEnum::getStripeSupportedCurrencies();

                if (in_array(Str::upper($calculatePayableCharge?->currency_code), $allCurrencyCodes['non_zero_currency_codes'])) {
                    $paid_amount = $paid_amount;
                } elseif (in_array(Str::upper($calculatePayableCharge?->currency_code), $allCurrencyCodes['three_digit_currency_codes'])) {
                    $paid_amount = (int) rtrim(strval($paid_amount), '0');
                } else {
                    $paid_amount = floatval($paid_amount / 100);
                }
            }

            $transaction = Str::random(10);
            $currency = allCurrencies()->where('currency_code', getSessionCurrency())->first();
            session()->put('invoice_id', $transaction);
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->payment_method = $method;
            $payment->transaction_id = $transaction;
            $payment->total_amount = $payable_amount;
            $payment->currency_rate = $currency->currency_rate;
            $payment->paid_amount = $paid_amount;
            $payment->status = 1;

            $payment->currency = $currency?->currency_name;
            $payment->payment_status = 'pending';
            $payment->payment_type = 'one-time';

            if (session('payment_for') == 'order') {
                $cart = session('cart');

                $request =  new Request();
                $request->merge([
                    'invoice_id' => $transaction,
                    'payment_method' => $method
                ]);

                $order = $this->orderService->storeOrder($request, $user, $cart);

                $payment->payment_for = 'order';
                $payment->order_id = $order->id;
                $payment->payment_mode = $order->payment_method == 'cod' ? 'manual' : 'automatic';
                $payment->payment_status = 'pending';
                $payment->save();
            } elseif (session('payment_for') == 'workout') {
                $cart = session('cart_workout');
                $enrollments = $this->enrollmentService->enrollWorkout($cart, $user, ['invoice_id' => $transaction]);
                $payment->payment_for = 'workout';
                $payment->enrollment_id = $enrollments[0]->id;
                $payment->payment_mode = 'automatic';
                $payment->payment_status = 'pending';

                $payment->save();
            } elseif (session('payment_for') == 'plan') {

                $plan = session('plan');


                $planType = session('planType');
                $payment->payment_for = 'plan';
                $data = [
                    'plan_id' => $plan->id,
                    'status' => $method == 'Direct Bank' ? 0 : 1,
                    'gateway' => $method,
                    'payment_status' => 'pending',
                    'transaction' => $transaction,
                    'total_amount' => session('total_amount'),
                    'subscription_type' => $planType
                ];
                if (!$user->member) {
                    $member = $this->memberService->storeMember($user, ['status' => 1]);
                    $subscription = null;
                    Bus::dispatchAfterResponse(function () use ($member, $data, $payment) {
                        $subscription = $this->memberService->makeSubscription($member, $data);
                        $payment->subscription_id = $subscription->id;
                    });
                } else {
                    $subscription = $this->memberService->makeSubscription($user->member, $data);
                    $payment->subscription_id = $subscription->id;
                }

                $payment->payment_status = 'pending';
                $payment->payment_mode = 'automatic';
                $payment->payment_for = 'plan';
                $payment->save();

                session()->forget('plan');
                session()->forget('planType');
            }

            $json_module_data = file_get_contents(base_path('modules_statuses.json'));
            $module_status = json_decode($json_module_data);

            if ($module_status->Coupon) {
                if ((Session::get('coupon_code') && Session::get('coupon_price')) || (Session::get('workout_coupon_code') && Session::get('workout_coupon_price'))) {

                    if (session('payment_for') != 'workout') {
                        $coupon = Coupon::where(['coupon_code' => Session::get('coupon_code')])->first();
                        $coupon_discount = Session::get('coupon_price');
                    } else {
                        $coupon = Coupon::where(['coupon_code' => Session::get('workout_coupon_code')])->first();
                        $coupon_discount = Session::get('workout_coupon_price');
                    }

                    if ($coupon) {
                        $history = new CouponHistory();
                        $history->user_id = $user->id;
                        $history->author_id = $coupon->author_id;
                        $history->coupon_code = $coupon->coupon_code;
                        $history->coupon_id = $coupon->id;
                        $history->discount_amount = $coupon_discount;
                        $history->save();
                    }

                    Session::forget('coupon_code');
                    Session::forget('coupon_price');
                    Session::forget('workout_coupon_code');
                    Session::forget('workout_coupon_price');
                }
            }

            DB::commit();
            // send mail
            // $this->handleMailSending([
            //     'email'          => $user->email,
            //     'name'           => $user->name,
            //     'order_id'       => $order->invoice_id,
            //     'paid_amount'    => $order->total_amount . ' ' . getSessionCurrency(),
            //     'payment_method' => $order->payment_method,
            // ]);

            Session::put('paid_amount', $paid_amount);

            return response()->json(['success' => true, 'invoice_id' => $transaction]);
        } catch (Exception $e) {
            DB::rollBack();
            info($e);
            return response()->json(['status' => false, 'message' => __('Payment Failed')]);
        }
    }
    function index()
    {
        $payableCurrency = Session::get('payable_currency');

        $totalAmount = Session::get('total_amount');
        Session::put('paid_amount', $totalAmount);
        $invoice_id = request('invoice_id', null);
        $user = userAuth();
        $paymentMethod = null;
        $amount = null;
        if (session('payment_for') == 'order') {
            $order = $user?->orders()
                ->where('invoice_id', $invoice_id)
                ->where('order_status', 'pending')->first();

            if (!$order) {
                $notification = [
                    'message'    => __('Not Found!'),
                    'alert-type' => 'error',
                ];
                return redirect()->back()->with($notification);
            }

            $paymentMethod = $order->payment_method;
        } elseif (session('payment_for') == 'workout') {
            $workout = WorkoutEnrollment::where('invoice_id', $invoice_id)->first();
            $payment = $workout->payment;

            if (!$payment) {
                $notification = [
                    'message'    => __('Not Found!'),
                    'alert-type' => 'error',
                ];
                return redirect()->back()->with($notification);
            }
            $paymentMethod = $payment->payment_method;
        } else if (session('payment_for') == 'plan') {
            $subscription = SubscriptionHistory::where('transaction', $invoice_id)->where('payment_status', 'pending')->first();

            if (!$subscription) {
                $notification = [
                    'message'    => __('Not Found!'),
                    'alert-type' => 'error',
                ];
                return redirect()->back()->with($notification);
            }
            $paymentMethod = $subscription->payment_method;
        }

        if (!$this->paymentService->isActive($paymentMethod)) {
            $notification = [
                'message'    => __('The selected payment method is now inactive.'),
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

        $calculatePayableCharge = $this->paymentService->getPayableAmount($paymentMethod, $totalAmount);

        Session::put('payable_currency', $payableCurrency);
        Session::put('paid_amount', $calculatePayableCharge?->payable_with_charge);


        $paymentService = $this->paymentService;
        $view = $this->paymentService->getBladeView($paymentMethod);
        return view($view, compact('paymentService', 'paymentMethod'));
    }
    public function pay_via_bank(BankInformationRequest $request)
    {
        $bankDetails = json_encode($request->only(['bank_name', 'account_number', 'routing_number', 'branch', 'transaction']));

        $allPayments = Order::whereNotNull('payment_details')->get();

        foreach ($allPayments as $payment) {
            $paymentDetailsJson = json_decode($payment?->payment_details, true);

            if (isset($paymentDetailsJson['account_number']) && $paymentDetailsJson['account_number'] == $request->account_number) {
                if (isset($paymentDetailsJson['transaction']) && $paymentDetailsJson['transaction'] == $request->transaction) {
                    $notification = __('Payment failed, transaction already exist');
                    $notification = ['message' => $notification, 'alert-type' => 'error'];

                    return redirect()->back()->with($notification);
                }
            }
        }
        Session::put('after_success_transaction', $request->transaction);
        Session::put('payment_details', $bankDetails);

        return $this->payment_success();
    }

    public function pay_via_paypal()
    {
        $basic_payment = $this->getBasicPaymentInfo();
        $paypal_credentials = (object) [
            'paypal_client_id'    => $basic_payment->paypal_client_id,
            'paypal_secret_key'   => $basic_payment->paypal_secret_key,
            'paypal_app_id'       => $basic_payment->paypal_app_id,
            'paypal_account_mode' => $basic_payment->paypal_account_mode,
        ];

        $after_success_url = route('payment-success');
        $after_failed_url = route('payment-failed');

        $paypal_payment = new FrontPaymentController();

        return $paypal_payment->pay_with_paypal($paypal_credentials, $after_success_url, $after_failed_url);
    }
    public function pay_via_stripe()
    {
        $basic_payment = $this->getBasicPaymentInfo();

        // Set your Stripe API secret key
        \Stripe\Stripe::setApiKey($basic_payment?->stripe_secret);

        $after_failed_url = route('payment-failed');

        session()->put('after_failed_url', $after_failed_url);

        $payable_currency = session('payable_currency') ?? getSessionCurrency();
        $paid_amount = session('paid_amount');



        $allCurrencyCodes = $this->paymentService->getSupportedCurrencies($this->paymentService::STRIPE);


        if (in_array(Str::upper($payable_currency), $allCurrencyCodes['non_zero_currency_codes'])) {
            $payable_with_charge = $paid_amount;
        } elseif (in_array(Str::upper($payable_currency), $allCurrencyCodes['three_digit_currency_codes'])) {
            $convertedCharge = (string) $paid_amount . '0';
            $payable_with_charge = (int) $convertedCharge;
        } else {
            $payable_with_charge = (int) ($paid_amount * 100);
        }

        // Create a checkout session
        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [[
                'price_data' => [
                    'currency'     => $payable_currency,
                    'unit_amount'  => $payable_with_charge,
                    'product_data' => [
                        'name' => cache()->get('setting')->app_name,
                    ],
                ],
                'quantity'   => 1,
            ]],
            'mode'                 => 'payment',
            'success_url'          => url('/pay-via-stripe') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => $after_failed_url,
        ]);

        // Redirect to the checkout session URL
        return redirect()->away($checkoutSession->url);
    }
    public function stripe_success(Request $request)
    {
        $after_success_url = route('payment-success');
        $basic_payment = $this->getBasicPaymentInfo();

        // Assuming the Checkout Session ID is passed as a query parameter
        $session_id = $request->query('session_id');
        if ($session_id) {
            \Stripe\Stripe::setApiKey($basic_payment->stripe_secret);

            $session = \Stripe\Checkout\Session::retrieve($session_id);

            $paymentDetails = [
                'transaction_id' => $session->payment_intent,
                'amount'         => $session->amount_total,
                'currency'       => $session->currency,
                'payment_status' => $session->payment_status,
                'created'        => $session->created,
            ];
            session()->put('after_success_url', $after_success_url);
            session()->put('after_success_transaction', $session->payment_intent);
            session()->put('payment_details', $paymentDetails);

            return redirect($after_success_url);
        }

        $after_failed_url = session()->get('after_failed_url');
        return redirect($after_failed_url);
    }
    public function pay_via_razorpay(Request $request)
    {
        $payment_setting = $this->getPaymentGatewayInfo();

        $after_success_url = route('payment-success');
        $after_failed_url = route('payment-failed');

        $razorpay_credentials = (object) [
            'razorpay_key'    => $payment_setting->razorpay_key,
            'razorpay_secret' => $payment_setting->razorpay_secret,
        ];

        return $this->pay_with_razorpay($request, $razorpay_credentials, $request->payable_amount, $after_success_url, $after_failed_url);
    }
    public function pay_with_razorpay(Request $request, $razorpay_credentials, $payable_amount, $after_success_url, $after_failed_url)
    {
        $input = $request->all();
        $api = new Api($razorpay_credentials->razorpay_key, $razorpay_credentials->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(['amount' => $payment['amount']]);

                $paymentDetails = [
                    'transaction_id' => $response->id,
                    'amount'         => $response->amount,
                    'currency'       => $response->currency,
                    'fee'            => $response->fee,
                    'description'    => $response->description,
                    'payment_method' => $response->method,
                    'status'         => $response->status,
                ];

                Session::put('after_success_url', $after_success_url);
                Session::put('after_failed_url', $after_failed_url);
                Session::put('after_success_transaction', $response->id);
                Session::put('payment_details', $paymentDetails);

                return redirect($after_success_url);
            } catch (Exception $e) {
                info($e->getMessage());
                return redirect($after_failed_url);
            }
        } else {
            return redirect($after_failed_url);
        }
    }
    public function flutterwave_payment(Request $request)
    {
        $payment_setting = $this->getPaymentGatewayInfo();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $payment_setting?->flutterwave_secret_key;
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                "Authorization: Bearer $token",
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if ($response->status == 'success') {
            $paymentDetails = [
                'status'            => $response->status,
                'trx_id'            => $tnx_id,
                'amount'            => $response?->data?->amount,
                'amount_settled'    => $response?->data?->amount_settled,
                'currency'          => $response?->data?->currency,
                'charged_amount'    => $response?->data?->charged_amount,
                'app_fee'           => $response?->data?->app_fee,
                'merchant_fee'      => $response?->data?->merchant_fee,
                'card_last_4digits' => $response?->data?->card?->last_4digits,
            ];
            Session::put('payment_details', $paymentDetails);
            Session::put('after_success_transaction', $tnx_id);

            return response()->json(['message' => 'Payment Success.']);
        } else {
            $notification = __('Payment failed, please try again');
            return response()->json(['message' => $notification], 403);
        }
    }
    public function paystack_payment(Request $request)
    {
        $payment_setting = $this->getPaymentGatewayInfo();

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $payment_setting?->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer $secret_key",
                'Cache-Control: no-cache',
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if ($final_data->status == true) {
            $paymentDetails = [
                'status'             => $final_data?->data?->status,
                'transaction_id'     => $transaction,
                'requested_amount'   => $final_data?->data->requested_amount,
                'amount'             => $final_data?->data?->amount,
                'currency'           => $final_data?->data?->currency,
                'gateway_response'   => $final_data?->data?->gateway_response,
                'paid_at'            => $final_data?->data?->paid_at,
                'card_last_4_digits' => $final_data?->data->authorization?->last4,
            ];
            Session::put('payment_details', $paymentDetails);
            Session::put('after_success_transaction', $transaction);
            return response()->json(['message' => 'Payment Success.']);
        } else {
            $notification = __('Payment failed, please try again');
            return response()->json(['message' => $notification], 403);
        }
    }
    public function pay_via_mollie()
    {
        $after_success_url = route('payment-success');
        $after_failed_url = route('payment-failed');

        session()->put('after_success_url', $after_success_url);
        session()->put('after_failed_url', $after_failed_url);

        $payment_setting = $this->getPaymentGatewayInfo();

        $mollie_credentials = (object) [
            'mollie_key' => $payment_setting->mollie_key,
        ];

        return $this->pay_with_mollie($mollie_credentials);
    }
    public function pay_with_mollie($mollie_credentials)
    {
        $payable_currency = session()->get('payable_currency');
        $paid_amount = session()->get('paid_amount');

        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey($mollie_credentials->mollie_key);

            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "$payable_currency",
                    "value" => "$paid_amount",
                ],
                "description" => userAuth()?->name,
                "redirectUrl" => route('mollie-payment-success'),
            ]);
            $payment = $mollie->payments->get($payment->id);

            session()->put('payment_id', $payment->id);
            session()->put('mollie_credentials', $mollie_credentials);

            return redirect($payment->getCheckoutUrl(), 303);
        } catch (Exception $ex) {
            info($ex->getMessage());
            $notification = __('Payment failed, please try again');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }
    }

    public function mollie_payment_success()
    {
        $mollie_credentials = Session::get('mollie_credentials');

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey($mollie_credentials->mollie_key);
        $payment = $mollie->payments->get(session()->get('payment_id'));

        if ($payment->isPaid()) {
            $paymentDetails = [
                'transaction_id' => $payment->id,
                'amount'         => $payment->amount->value,
                'currency'       => $payment->amount->currency,
                'fee'            => $payment->settlementAmount->value . ' ' . $payment->settlementAmount->currency,
                'description'    => $payment->description,
                'payment_method' => $payment->method,
                'status'         => $payment->status,
                'paid_at'        => $payment->paidAt,
            ];

            Session::put('payment_details', $paymentDetails);
            Session::put('after_success_transaction', session()->get('payment_id'));

            $after_success_url = Session::get('after_success_url');

            return redirect($after_success_url);
        } else {
            $after_failed_url = Session::get('after_failed_url');
            return redirect($after_failed_url);
        }
    }
    public function pay_via_instamojo()
    {
        $after_success_url = route('payment-success');
        $after_failed_url = route('payment-failed');

        session()->put('after_success_url', $after_success_url);
        session()->put('after_failed_url', $after_failed_url);

        $payment_setting = $this->getPaymentGatewayInfo();

        $instamojo_credentials = (object) [
            'instamojo_api_key'    => $payment_setting->instamojo_api_key,
            'instamojo_auth_token' => $payment_setting->instamojo_auth_token,
            'account_mode'         => $payment_setting->instamojo_account_mode,
        ];

        return $this->pay_with_instamojo($instamojo_credentials);
    }
    public function pay_with_instamojo($instamojo_credentials)
    {
        $payable_currency = session()->get('payable_currency');
        $paid_amount = session()->get('paid_amount');

        $environment = $instamojo_credentials->account_mode;
        $api_key = $instamojo_credentials->instamojo_api_key;
        $auth_token = $instamojo_credentials->instamojo_auth_token;

        if ($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url . 'payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                [
                    "X-Api-Key:$api_key",
                    "X-Auth-Token:$auth_token"
                ]
            );
            $payload = [
                'purpose'                 => env('APP_NAME'),
                'amount'                  => $paid_amount,
                'phone'                   => '918160651749',
                'buyer_name'              => userAuth()?->name,
                'redirect_url'            => route('instamojo-success'),
                'send_email'              => true,
                'webhook'                 => 'http://www.example.com/webhook/',
                'send_sms'                => true,
                'email'                   => userAuth()?->email,
                'allow_repeated_payments' => false,
            ];
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response);
            session()->put('instamojo_credentials', $instamojo_credentials);


            if (!empty($response?->payment_request?->longurl)) {
                return redirect($response?->payment_request?->longurl);
            } else {
                return redirect()->route('student.orders.index')->with(['message' => __('Payment failed, please try again'), 'alert-type' => 'error']);
            }
        } catch (Exception $ex) {
            info($ex->getMessage());
            $notification = __('Payment failed, please try again');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->back()->with($notification);
        }
    }
    public function instamojo_success(Request $request)
    {

        $instamojo_credentials = Session::get('instamojo_credentials');

        $input = $request->all();
        $environment = $instamojo_credentials->account_mode;
        $api_key = $instamojo_credentials->instamojo_api_key;
        $auth_token = $instamojo_credentials->instamojo_auth_token;

        if ($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . 'payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                "X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"
            ]
        );
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $after_failed_url = Session::get('after_failed_url');

            return redirect($after_failed_url);
        } else {
            $data = json_decode($response);
        }

        if ($data->success == true) {
            if ($data->payment->status == 'Credit') {
                Session::put('after_success_transaction', $request->get('payment_id'));
                Session::put('paid_amount', $data->payment->amount);
                $after_success_url = Session::get('after_success_url');

                return redirect($after_success_url);
            }
        } else {
            $after_failed_url = Session::get('after_failed_url');

            return redirect($after_failed_url);
        }
    }

    public function payment_success()
    {
        $order = session()->get('order');
        $invoiceId = session('invoice_id');

        $after_success_transaction = session()->get('after_success_transaction', null);
        $payment_details = session()->get('payment_details', null);
        $orderStatus = 'pending';
        $paymentMethod = null;
        try {

            $notification = null;
            if (session('payment_for') == 'order') {
                $order = Order::where('invoice_id', $invoiceId)->first();
                if ($order) {
                    $order->transaction_id = $after_success_transaction;
                    $order->payment_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';
                    $order->order_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';

                    $order->save();

                    $payment = $order->payment;

                    if ($payment) {
                        $payment->transaction_id = $after_success_transaction;
                        $payment->payment_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';
                        $payment->save(); // Save changes to the Payment model

                    }
                    $paymentMethod = $order->payment_method;
                }
                $orderStatus = $order->order_status;
                $notification = __('Order placed successfully. please wait for admin approval');
            } elseif (session('payment_for') == 'workout') {
                $order = WorkoutEnrollment::where('invoice_id', $invoiceId)->first();
                if ($order) {
                    $payment = $order->payment;

                    if ($payment) {
                        $payment->payment_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';

                        $payment->transaction_id = $after_success_transaction;
                        $payment->save();
                        $orderStatus = $payment->payment_status;
                    }
                    $paymentMethod = $order->payment_method;
                }

                $notification = __('Workout enrolled successfully');
            } else if (session('payment_for') == 'plan') {
                $order = SubscriptionHistory::where('transaction', $invoiceId)->first();
                $order->payment_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';

                $order->save();
                if ($order) {
                    $payment = $order->payment;

                    if ($payment) {
                        $payment->payment_status = $order->payment_method == $this->paymentService::BANK_PAYMENT ? 'pending' : 'success';
                        $payment->transaction_id = $after_success_transaction;
                        $payment->save();
                        $orderStatus = $payment->payment_status;
                    }
                }
                $paymentMethod = $order->payment_method;


                $notification = ($order->payment_method === $this->paymentService::BANK_PAYMENT)
                    ? __('Subscription purchase successful. Please wait for admin approval.')
                    : __('Subscription activated successfully.');
            }


            $user = userAuth();
            // send mail
            $this->sendingPaymentStatusMail([
                'name'           => $user->name,
                'paid_amount'    => $order->paid_amount . ' ' . $order->payable_currency,
                'payment_status' => $order->payment_status,
                'order_status'   => $orderStatus,
                'payment_method' => $paymentMethod,
                'order_date'     => $order->created_at->format('d F, Y'),
            ]);

            $this->orderSessionForget();

            $notification = array('message' => $notification, 'alert-type' => 'success');
            session()->forget('after_success_gateway');
            session()->forget('payment_for');
            return to_route('website.user.dashboard')->with($notification);
        } catch (Exception $e) {
            logger()->error($e);
            $notification = trans('Payment failed, please try again');
            $notification = ['message' => $notification, 'alert-type' => 'error'];

            return redirect()->route('payment-failed')->with($notification);
        }
    }

    function payment_failed()
    {
        $order = session()->get('order');
        $invoiceId = session('invoice_id');

        if (session('payment_for') == 'order') {
            $order = Order::where('invoice_id', $invoiceId)->first();
        } elseif (session('payment_for') == 'workout') {
            $order = WorkoutEnrollment::where('invoice_id', $invoiceId)->first();
        } else if (session('payment_for') == 'plan') {
            $order = SubscriptionHistory::where('transaction', $invoiceId)->first();
        }

        $payment = $order->payment;
        if ($payment) {
            // delete payment
            $payment->delete();
        }
        $orderDetails = $order->orderDetails;
        if ($orderDetails) {
            foreach ($orderDetails as $orderDetail) {
                $orderDetail->delete();
            }
        }

        $order->delete();

        // remove invoice_id
        session()->forget('invoice_id');

        $notification = __('Payment failed, please try again');
        $notification = ['message' => $notification, 'alert-type' => 'error'];

        return redirect()->route('website.order-fail')->with($notification);
    }

    function handleMailSending(array $mailData)
    {
        try {
            self::setMailConfig();

            // Get email template
            $template = EmailTemplate::where('name', 'order_completed')->firstOrFail();
            $mailData['subject'] = $template->subject;

            // Prepare email content
            $message = str_replace('{{name}}', $mailData['name'], $template->message);
            $message = str_replace('{{order_id}}', $mailData['order_id'], $message);
            $message = str_replace('{{paid_amount}}', $mailData['paid_amount'], $message);
            $message = str_replace('{{payment_method}}', $mailData['payment_method'], $message);

            // if (self::isQueable()) {
            //     DefaultMailJob::dispatch($mailData['email'], $mailData, $message);
            // } else {
            //     Mail::to($mailData['email'])->send(new DefaultMail($mailData, $message));
            // }
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
    function sendingPaymentStatusMail(array $mailData)
    {
        try {
            // self::setMailConfig();

            // Get email template
            $template = EmailTemplate::where('name', 'Payment Success')->firstOrFail();
            $mailData['subject'] = $template->subject;

            // Prepare email content
            $message = str_replace('{{user_name}}', $mailData['name'], $template->message);
            $message = str_replace('{{payment_method}}', $mailData['payment_method'], $message);
            $message = str_replace('{{total_amount}}', $mailData['paid_amount'], $message);
            $message = str_replace('{{payment_status}}', $mailData['payment_status'], $message);
            $message = str_replace('{{order_status}}', $mailData['order_status'], $message);
            $message = str_replace('{{order_date}}', $mailData['order_date'], $message);

            // if (self::isQueable()) {
            //     DefaultMailJob::dispatch($mailData['email'], $mailData, $message);
            // } else {
            //     Mail::to($mailData['email'])->send(new DefaultMail($mailData, $message));
            // }
            $this->sendOrderSuccessMailFromTrait($mailData['subject'], $message, userAuth(), null);
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
    private function orderSessionForget()
    {
        session()->forget(
            [
                'after_success_url',
                'after_failed_url',
                'order',
                'payable_amount',
                'gateway_charge',
                'after_success_gateway',
                'after_success_transaction',
                'subscription_plan_id',
                'payable_with_charge',
                'payable_currency',
                'subscription_plan_id',
                'paid_amount',
                'payment_details',
                'cart',
                'coupon_code',
                'offer_percentage',
                'coupon_discount_amount',
                'gateway_charge_in_usd',
                'invoice_id',
                'payment_for',
                'subscription_plan_id',
                'plan_id',
                'delivery_address',
                'delivery_area',
                'sub_total',
                'tax_amount',
                'planType',
                'coupon_price',
                'coupon_discount_amount',
                'total_amount',
                'delivery_charge',
                'grand_total',
                'order_status',
            ]
        );
    }
}
