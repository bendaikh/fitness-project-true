<?php

namespace App\Http\Controllers\website;

use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\MemberService;
use App\Services\EnrollmentService;
use Modules\Order\app\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\WorkoutEnrollment;
use Illuminate\Support\Facades\Auth;
use Modules\Coupon\app\Models\Coupon;
use Illuminate\Support\Facades\Session;
use App\Traits\GetGlobalInformationTrait;
use Illuminate\Support\Facades\Bus;
use Modules\Coupon\app\Models\CouponHistory;
use Modules\Order\app\Services\OrderService;
use Modules\Currency\app\Models\MultiCurrency;
use Modules\ClubPoint\app\Models\ClubPointHistory;
use Modules\Subscription\app\Models\SubscriptionPlan;
use Modules\BasicPayment\app\Http\Controllers\FrontPaymentController;
use Modules\PaymentGateway\app\Http\Controllers\AddonPaymentController;
use Modules\BasicPayment\app\Enums\BasicPaymentSupportedCurrenyListEnum;
use Modules\Subscription\app\Models\SubscriptionHistory;

class PaymentController extends Controller
{
    use GetGlobalInformationTrait;

    protected $orderService;
    protected $enrollmentService;
    protected $memberService;

    public function __construct(OrderService $orderService, EnrollmentService $enrollmentService, MemberService $memberService)
    {
        $this->orderService = $orderService;
        $this->enrollmentService = $enrollmentService;
        $this->memberService = $memberService;
    }

    public function payment()
    {
        session()->put('payment_for', request()->type ? request()->type : 'order');

        $cart_contents = null;
        if (session("payment_for") == 'order') {
            $cart_contents = session('cart');
            if ($cart_contents == null || count($cart_contents) == 0) {
                $notification = __('Your Cart is Empty. Please add some items first!');
                return redirect()->route('website.shop')->with([
                    'message' => $notification,
                    'alert-type' => 'error',
                ]);
            }
        } elseif (session("payment_for") == "workout") {
            $cart_contents = session('cart_workout');
            if ($cart_contents == null || count($cart_contents) == 0) {
                $notification = __('Your Cart is Empty. Please add some items first!');
                return redirect()->route('website.workout')->with([
                    'message' => $notification,
                    'alert-type' => 'error',
                ]);
            }
        } elseif (session("payment_for") == "plan") {
            if (request()->plan_id == null) {
                $notification = __('Please select a plan');
                return redirect()->route('website.plan')->with([
                    'message' => $notification,
                    'alert-type' => 'error',
                ]);
            }
            if (request()->plan == null) {
                $planType = 'monthly';
            } else {
                $planType = request()->plan;
            }
            $plan = SubscriptionPlan::find(request()->plan_id);
            if ($plan == null) {
                $notification = __('Invalid Plan');
                return redirect()->route('website.plan')->with([
                    'message' => $notification,
                    'alert-type' => 'error',
                ]);
            }
            $payable_amount = $planType == 'monthly' ? $plan->plan_price : $plan->yearly_price;

            $cart_contents = [
                'plan_id' => request()->plan_id,
                'plan_type' => $planType,
                'plan' => $plan,
            ];
            session()->put('total_amount', $payable_amount);
            session()->put('plan', $plan);
            session()->put('plan_id', $plan->id);
            session()->put('planType', $planType);
        }

        $payable_amount = session('total_amount');


        $user = Auth::guard('web')->user();

        $paymentService = app(\Modules\BasicPayment\app\Services\PaymentMethodService::class);
        $activeGateways = $paymentService->getActiveGatewaysWithDetails();



        $invoiceId = session('invoice_id');

        if ($invoiceId) {
            if (session('payment_for') == 'order') {
                $order = Order::where('invoice_id', $invoiceId)->first();
            } elseif (session('payment_for') == 'workout') {
                $order = WorkoutEnrollment::where('invoice_id', $invoiceId)->first();
            } else if (session('payment_for') == 'plan') {
                $order = SubscriptionHistory::where('transaction', $invoiceId)->first();
            }

            if ($order) {
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
            }

            session()->forget('invoice_id');
        }

        return view('website.pages.cart.payment')->with([
            'cart_contents' => $cart_contents,
            'user' => $user,
            'payable_amount' => $payable_amount,
            'activeGateways' => $activeGateways,
        ]);
    }

    public function calculate_amount($address_id)
    {

        $delivery_charge = Session::get('delivery_charge');
        $sub_total = 0;
        $coupon_price = 0.00;

        $cart_contents = Session::get('cart');

        if (Session::get('coupon_price') && Session::get('offer_type')) {
            if (Session::get('offer_type') == 1) {
                $coupon_price = Session::get('coupon_price');
                $coupon_price = ($coupon_price / 100) * $sub_total;
            } else {
                $coupon_price = Session::get('coupon_price');
            }
        }

        $grand_total = ($sub_total - $coupon_price) + $delivery_charge;

        return array(
            'sub_total' => $sub_total,
            'coupon_price' => $coupon_price,
            'delivery_charge' => $delivery_charge,
            'grand_total' => $grand_total,
        );
    }

    public function apply_coupon(Request $request)
    {

        $rules = [
            'coupon' => 'required',
            'author_id' => 'required',
            /**default author id is 0 */
        ];
        $customMessages = [
            'coupon.required' => __('Coupon is required'),
            'author_id.required' => __('Author id is required'),
        ];

        $request->validate($rules, $customMessages);

        $coupon = Coupon::where(['coupon_code' => $request->coupon, 'status' => 'active'])->first();

        if (!$coupon) {
            $notification = __('Invalid coupon');

            return response()->json(['message' => $notification], 403);
        }

        if ($coupon->expired_date < date('Y-m-d')) {
            $notification = __('Coupon already expired');

            return response()->json(['message' => $notification], 403);
        }

        /** when coupon will be handle for particular seller or author , below condition will be used  */
        if ($coupon->author_id != 0) {
            if ($coupon->author_id != $request->author_id) {
                $notification = __('You can not apply another provider coupon');

                return response()->json(['message' => $notification], 403);
            }
        }

        /** when coupon will be handle for particular seller or author , above condition will be used  */
        Session::put('coupon_code', $coupon->coupon_code);
        Session::put('offer_percentage', $coupon->offer_percentage);

        $notification = __('Coupon applied successful');

        return response()->json(['message' => $notification, 'coupon_code' => $coupon->coupon_code, 'offer_percentage' => $coupon->offer_percentage]);
    }

    public function stripe_pay(Request $request)
    {
        $basic_payment = $this->get_basic_payment_info();

        $payable_amount = session('total_amount');
        /** developer need to assign the amount here */

        // Set your Stripe API secret key
        \Stripe\Stripe::setApiKey($basic_payment->stripe_secret);

        $calculate_payable_charge = $this->calculate_payable_charge($payable_amount, 'stripe');

        $payable_with_charge = (int) ($calculate_payable_charge->payable_with_charge * 100);

        $allCurrencyCodes = BasicPaymentSupportedCurrenyListEnum::getStripeSupportedCurrencies();

        if (in_array(Str::upper($calculate_payable_charge->currency_code), $allCurrencyCodes['non_zero_currency_codes'])) {
            $payable_with_charge = $calculate_payable_charge->payable_with_charge;
        } elseif (in_array(Str::upper($calculate_payable_charge->currency_code), $allCurrencyCodes['three_digit_currency_codes'])) {
            $convertedCharge = (string) $calculate_payable_charge->payable_with_charge . '0';
            $payable_with_charge = (int) $convertedCharge;
        } else {
            $payable_with_charge = (int) ($calculate_payable_charge->payable_with_charge * 100);
        }

        $after_faild_url = route('payment-addon-faild');


        Session::put('payable_currency', $calculate_payable_charge->currency_code);
        Session::put('payable_amount', $calculate_payable_charge->payable_with_charge);
        Session::put('payable_with_charge', $payable_with_charge);
        Session::put('after_faild_url', $after_faild_url);

        // Create a checkout session
        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => [[
                'price_data' => [
                    'currency'    => $calculate_payable_charge->currency_code,
                    'unit_amount' => $payable_with_charge, // Replace with the actual amount in cents
                    'product_data' => [
                        'name' => config('app.name'),
                    ],
                ],
                'quantity'   => 1,
            ]],
            'mode'                 => 'payment',
            'success_url'          => url('/pay-via-stripe') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => $after_faild_url,
        ]);

        // Redirect to the checkout session URL
        return redirect()->away($checkoutSession->url);
    }
    public function stripe_success(Request $request)
    {
        $after_success_url = route('payment-addon-success');

        $basic_payment = $this->get_basic_payment_info();

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

            Session::put('after_success_url', $after_success_url);
            Session::put('paid_amount', $session->amount_total);
            Session::put('after_success_gateway', 'Stripe');
            Session::put('after_success_transaction', $session->payment_intent);
            Session::put('payment_details', $paymentDetails);

            return redirect($after_success_url);
        }

        $after_faild_url = Session::get('after_faild_url');
        return redirect($after_faild_url);
    }


    public function pay_via_paypal()
    {
        $basic_payment = $this->get_basic_payment_info();

        $payable_amount = session('total_amount');
        /** developer need to assign the amount here */

        $after_success_url = route('payment.success');
        $after_failed_url = route('payment.failed');

        $paypal_credentials = (object) array(
            'paypal_client_id' => $basic_payment->paypal_client_id,
            'paypal_secret_key' => $basic_payment->paypal_secret_key,
            'paypal_account_mode' => $basic_payment->paypal_account_mode,
        );

        $user = Auth::guard('web')->user();

        $paypal_payment = new FrontPaymentController();
        return $paypal_payment->pay_with_paypal($paypal_credentials, $payable_amount, $after_success_url, $after_failed_url, $user);
    }

    public function pay_via_bank(Request $request)
    {
        $request->validate([
            'tnx_info' => 'required',
        ], [
            'tnx_info.required' => __('Transaction information is required'),
        ]);

        $payable_amount = session('total_amount');
        /** developer need to assign the amount here */

        $after_success_url = route('payment.success');
        $after_failed_url = route('payment.failed');

        $user = Auth::guard('web')->user();

        Session::put('payable_currency', getSessionCurrency());
        Session::put('after_success_url', $after_success_url);
        Session::put('after_failed_url', $after_failed_url);
        Session::put('payable_amount', $payable_amount);
        Session::put('after_success_gateway', 'Direct Bank');
        Session::put('after_success_transaction', $request->tnx_info);

        return $this->payment_addon_success();
    }

    public function pay_via_razorpay(Request $request)
    {

        $payment_setting = $this->get_payment_gateway_info();

        $after_success_url = route('payment-addon-success');
        $after_faild_url = route('payment-addon-faild');

        $user = Auth::guard('web')->user();

        $razorpay_credentials = (object) [
            'razorpay_key' => $payment_setting->razorpay_key,
            'razorpay_secret' => $payment_setting->razorpay_secret,
        ];

        $razorpay_payment = new AddonPaymentController();

        return $razorpay_payment->pay_with_razorpay($request, $razorpay_credentials, session('total_amount'), $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_mollie(Request $request)
    {

        $payable_amount = session('total_amount');
        /** developer need to assign the amount here */
        $after_success_url = route('payment-addon-success');
        $after_faild_url = route('payment-addon-faild');

        $user = Auth::guard('web')->user();

        $payment_setting = $this->get_payment_gateway_info();

        $mollie_credentials = (object) [
            'mollie_key' => $payment_setting->mollie_key,
        ];

        $mollie_payment = new AddonPaymentController();

        return $mollie_payment->pay_with_mollie($mollie_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_instamojo()
    {

        $payable_amount = session('total_amount');
        /** developer need to assign the amount here */
        $after_success_url = route('payment-addon-success');
        $after_faild_url = route('payment-addon-faild');

        $user = Auth::guard('web')->user();

        $payment_setting = $this->get_payment_gateway_info();

        $instamojo_credentials = (object) [
            'instamojo_api_key' => $payment_setting->instamojo_api_key,
            'instamojo_auth_token' => $payment_setting->instamojo_auth_token,
            'account_mode' => $payment_setting->instamojo_account_mode,
        ];

        $instamojo_payment = new AddonPaymentController();

        return $instamojo_payment->pay_with_instamojo($instamojo_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }
    function paystackPayment(Request $request)
    {

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $request->secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $secret_key",
                'Cache-Control: no-cache',
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            info($err);
        }
        curl_close($curl);
        $final_data = json_decode($response);
        if ($final_data->status == true) {

            $paymentDetails = [
                'status' => $final_data?->data?->status,
                'transaction_id' => $transaction,
                'requested_amount' => $final_data?->data->requested_amount,
                'amount' => $final_data?->data?->amount,
                'currency' => $final_data?->data?->currency,
                'gateway_response' => $final_data?->data?->gateway_response,
                'paid_at' => $final_data?->data?->paid_at,
                'card_last_4_digits' => $final_data?->data->authorization?->last4,
            ];

            Session::put('payable_amount', ($final_data?->data?->amount / 100));
            Session::put('payable_currency', $final_data?->data?->currency);
            Session::put('payment_details', $paymentDetails);
            Session::put('after_success_gateway', 'Paystack');
            Session::put('after_success_transaction', $transaction);
            Session::put('payable_with_charge', $final_data?->data?->amount / 100);

            return response()->json(['message' => 'payment success']);
        } else {
            $notification = trans('Something went wrong, please try again');

            return response()->json(['message' => $notification], 403);
        }
    }

    function pay_via_flutterwave(Request $request)
    {
        $payment_setting = $this->get_payment_gateway_info();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $payment_setting->flutterwave_secret_key;

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                "Authorization: Bearer $token",
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if ($response->status == 'success') {

            $paymentDetails = [
                'status' => $response->status,
                'trx_id' => $tnx_id,
                'amount' => $response?->data?->amount,
                'amount_settled' => $response?->data?->amount_settled,
                'currency' => $response?->data?->currency,
                'charged_amount' => $response?->data?->charged_amount,
                'app_fee' => $response?->data?->app_fee,
                'merchant_fee' => $response?->data?->merchant_fee,
                'card_last_4digits' => $response?->data?->card?->last_4digits,
            ];

            Session::put('payable_amount', $response?->data?->amount);
            Session::put('payable_currency', $response?->data?->currency);
            Session::put('payment_details', $paymentDetails);
            Session::put('after_success_gateway', 'Flutterwave');
            Session::put('after_success_transaction', $tnx_id);
            Session::put('payable_with_charge', $response?->data?->amount);

            return response()->json(['message' => 'payment success']);
        } else {
            $notification = trans('Payment Fail');

            return response()->json(['message' => $notification], 403);
        }
    }

    public function payment_addon_success()
    {

        $payable_amount = Session::get('total_amount');
        $gateway_name = Session::get('after_success_gateway');
        $transaction = Session::get('after_success_transaction');
        $currency = allCurrencies()->where('currency_code', session('payable_currency'))->first();

        $user = Auth::guard('web')->user();

        $payment = new Payment();
        $payment->user_id = $user->id;
        $payment->payment_method = $gateway_name;
        $payment->transaction_id = $transaction;
        $payment->total_amount = $payable_amount;
        $payment->status = 1;

        $payment->currency = $currency?->currency_name;
        $payment->payment_status = 'success';
        $payment->payment_type = 'one-time';

        /**write your project logic here after successfully payment, you can use above information if you need. */


        $json_module_data = file_get_contents(base_path('modules_statuses.json'));
        $module_status = json_decode($json_module_data);


        if (session('payment_for') == 'order') {
            $cart = session('cart');

            $request =  new Request();
            $order = $this->orderService->storeOrder($request, $user, $cart);

            $payment->payment_for = 'order';
            $payment->order_id = $order->id;
            $payment->payment_mode = $order->payment_method == 'cod' ? 'manual' : 'automatic';
            $payment->payment_status = $gateway_name == 'Direct Bank' ? 'pending' : 'success';
            $payment->save();
        } elseif (session('payment_for') == 'workout') {
            $cart = session('cart_workout');
            $enrollments = $this->enrollmentService->enrollWorkout($cart, $user);
            $payment->payment_for = 'workout';
            $payment->enrollment_id = $enrollments[0]->id;
            $payment->payment_mode = 'automatic';
            $payment->payment_status = $gateway_name == 'Direct Bank' ? 'pending' : 'success';

            $payment->save();
        } elseif (session('payment_for') == 'plan') {

            $plan = session('plan');
            $planType = session('planType');
            $payment->payment_for = 'plan';
            $data = [
                'plan_id' => $plan->id,
                'status' => $gateway_name == 'Direct Bank' ? 0 : 1,
                'gateway' => $gateway_name,
                'payment_status' => $gateway_name == 'Direct Bank' ? 'pending' : 'success',
                'transaction_id' => $transaction,
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

            $payment->payment_status = $gateway_name == 'Direct Bank' ? 'pending' : 'success';
            $payment->payment_mode = 'automatic';
            $payment->payment_for = 'plan';
            $payment->save();

            session()->forget('plan');
            session()->forget('planType');
        }

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

        /**after write all logic you need to forget all session data*/

        session()->forget('total_amount');
        session()->forget('tax_amount');
        session()->forget('sub_total');
        session()->forget('after_success_url');
        session()->forget('after_failed_url');
        session()->forget('payable_amount');
        session()->forget('payable_currency');

        session()->forget('after_success_transaction');
        session()->forget('delivery_address');
        session()->forget('delivery_area');
        session()->forget('billing_address');
        session()->forget('delivery_fee');
        session()->forget('cart');
        session()->forget('cart_workout');


        $notification = null;
        if (session('payment_for') == 'order') {
            $notification = __('Order placed successfully. please wait for admin approval');
        } elseif (session('payment_for') == 'workout') {
            $notification = __('Workout enrolled successfully');
        } else if (session('payment_for') == 'plan') {
            $notification = ($gateway_name === 'Direct Bank')
                ? __('Subscription purchase successful. Please wait for admin approval.')
                : __('Subscription activated successfully.');
        }
        $notification = array('message' => $notification, 'alert-type' => 'success');
        session()->forget('after_success_gateway');
        session()->forget('payment_for');
        return to_route('website.user.dashboard')->with($notification);
    }

    public function payment_addon_faild()
    {

        /**you can write here your project related code */

        Session::forget('after_success_url');
        Session::forget('after_faild_url');
        Session::forget('payable_amount');
        Session::forget('gateway_charge');
        Session::forget('currency_rate');
        Session::forget('after_success_gateway');
        Session::forget('after_success_transaction');

        $notification = __('Payment faild, please try again');
        $notification = ['message' => $notification, 'alert-type' => 'error'];

        return redirect()->route('website.order-fail')->with($notification);
    }

    public function order_fail()
    {
        return view('website.pages.cart.order-fail');
    }
}
