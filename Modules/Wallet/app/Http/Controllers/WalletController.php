<?php

namespace Modules\Wallet\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\GetGlobalInformationTrait;
use Auth;
use Illuminate\Http\Request;
use Modules\BasicPayment\app\Http\Controllers\FrontPaymentController;
use Modules\PaymentGateway\app\Http\Controllers\AddonPaymentController;
use Modules\Wallet\app\Models\WalletHistory;
use Mollie\Laravel\Facades\Mollie;
use Session;

class WalletController extends Controller
{
    use GetGlobalInformationTrait;

    public function index()
    {
        $auth_user = Auth::guard('web')->user();

        $wallet_histories = WalletHistory::where('user_id', $auth_user->id)->latest()->get();

        return view('wallet::index', ['wallet_histories' => $wallet_histories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ], [
            'amount.required' => __('Amount is required'),
        ]);

        $payable_amount = $request->amount;

        $user = Auth::guard('web')->user();

        $basic_payment = $this->get_basic_payment_info();
        $payment_setting = $this->get_payment_gateway_info();

        /**start razorpay setting */
        $razorpay_calculate_charge = $this->calculate_payable_charge($payable_amount, 'razorpay');

        $razorpay_credentials = (object) [
            'currency_code' => $razorpay_calculate_charge->currency_code,
            'payable_with_charge' => $razorpay_calculate_charge->payable_with_charge,
            'razorpay_key' => $payment_setting->razorpay_key,
            'razorpay_secret' => $payment_setting->razorpay_secret,
            'razorpay_name' => $payment_setting->razorpay_name,
            'razorpay_description' => $payment_setting->razorpay_description,
            'razorpay_image' => $payment_setting->razorpay_image,
            'razorpay_theme_color' => $payment_setting->razorpay_theme_color,
            'razorpay_status' => $payment_setting->razorpay_status,
        ];
        /**end razorpay setting */

        /**start mollie setting */
        $mollie_credentials = (object) [
            'mollie_status' => $payment_setting->mollie_status,
        ];
        /**end mollie setting */

        /**start instamojo setting */
        $instamojo_credentials = (object) [
            'instamojo_status' => $payment_setting->instamojo_status,
        ];
        /**end instamojo setting */

        /**start flutterwave setting */
        $flutterwave_calculate_charge = $this->calculate_payable_charge($payable_amount, 'flutterwave');

        $flutterwave_credentials = (object) [
            'country_code' => $flutterwave_calculate_charge->country_code,
            'currency_code' => $flutterwave_calculate_charge->currency_code,
            'payable_with_charge' => $flutterwave_calculate_charge->payable_with_charge,
            'flutterwave_public_key' => $payment_setting->flutterwave_public_key,
            'flutterwave_secret_key' => $payment_setting->flutterwave_secret_key,
            'flutterwave_app_name' => $payment_setting->flutterwave_app_name,
            'flutterwave_status' => $payment_setting->flutterwave_status,
            'flutterwave_image' => $payment_setting->flutterwave_image,
        ];
        /**end flutterwave setting */

        /**start paystack setting */
        $paystack_calculate_charge = $this->calculate_payable_charge($payable_amount, 'paystack');

        $paystack_credentials = (object) [
            'country_code' => $paystack_calculate_charge->country_code,
            'currency_code' => $paystack_calculate_charge->currency_code,
            'payable_with_charge' => $paystack_calculate_charge->payable_with_charge,
            'paystack_public_key' => $payment_setting->paystack_public_key,
            'paystack_secret_key' => $payment_setting->paystack_secret_key,
            'paystack_status' => $payment_setting->paystack_status,
        ];
        /**end paystack setting */

        return view('wallet::payment')->with([
            'user' => $user,
            'payable_amount' => $payable_amount,
            'basic_payment' => $basic_payment,
            'payment_setting' => $payment_setting,
            'razorpay_credentials' => $razorpay_credentials,
            'mollie_credentials' => $mollie_credentials,
            'instamojo_credentials' => $instamojo_credentials,
            'flutterwave_credentials' => $flutterwave_credentials,
            'paystack_credentials' => $paystack_credentials,
        ]);
    }

    public function pay_via_stripe(Request $request)
    {

        $basic_payment = $this->get_basic_payment_info();

        $payable_amount = $request->payable_amount;
        /** developer need to assign the amount here */
        $after_success_url = route('wallet.payment-addon-success');
        $after_faild_url = route('wallet.payment-addon-faild');

        $stripe_credentials = (object) [
            'stripe_key' => $basic_payment->stripe_key,
            'stripe_secret' => $basic_payment->stripe_secret,
        ];

        $user = Auth::guard('web')->user();

        $stripe_payment = new FrontPaymentController();

        return $stripe_payment->pay_with_stripe($request, $stripe_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_paypal(Request $request)
    {

        $request->validate([
            'payable_amount' => 'required',
        ], [
            'payable_amount.required' => __('Amount is required'),
        ]);

        $basic_payment = $this->get_basic_payment_info();

        $payable_amount = $request->payable_amount;
        /** developer need to assign the amount here */
        $after_success_url = route('wallet.payment-addon-success');
        $after_faild_url = route('wallet.payment-addon-faild');

        $paypal_credentials = (object) [
            'paypal_client_id' => $basic_payment->paypal_client_id,
            'paypal_secret_key' => $basic_payment->paypal_secret_key,
            'paypal_account_mode' => $basic_payment->paypal_account_mode,
        ];

        $user = Auth::guard('web')->user();

        $paypal_payment = new FrontPaymentController();

        return $paypal_payment->pay_with_paypal($paypal_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_bank(Request $request)
    {

        $request->validate([
            'payable_amount' => 'required',
        ], [
            'payable_amount.required' => __('Amount is required'),
        ]);

        $payable_amount = $request->payable_amount;
        /** developer need to assign the amount here */
        $after_success_url = route('payment-addon-success');
        $after_faild_url = route('payment-addon-faild');

        $user = Auth::guard('web')->user();

        Session::put('after_success_url', $after_success_url);
        Session::put('after_faild_url', $after_faild_url);
        Session::put('payable_amount', $payable_amount);
        Session::put('after_success_gateway', 'Direct Bank');
        Session::put('after_success_transaction', $request->bank_transaction);

        return $this->payment_addon_success();
    }

    public function pay_via_razorpay(Request $request)
    {

        $payment_setting = $this->get_payment_gateway_info();

        $after_success_url = route('wallet.payment-addon-success');
        $after_faild_url = route('wallet.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $razorpay_credentials = (object) [
            'razorpay_key' => $payment_setting->razorpay_key,
            'razorpay_secret' => $payment_setting->razorpay_secret,
        ];

        $razorpay_payment = new AddonPaymentController();

        return $razorpay_payment->pay_with_razorpay($request, $razorpay_credentials, $request->payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_mollie(Request $request)
    {

        $request->validate([
            'payable_amount' => 'required',
        ], [
            'payable_amount.required' => __('Amount is required'),
        ]);

        $payable_amount = $request->payable_amount;
        /** developer need to assign the amount here */
        $after_success_url = route('wallet.payment-addon-success');
        $after_faild_url = route('wallet.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $payment_setting = $this->get_payment_gateway_info();

        $mollie_credentials = (object) [
            'mollie_key' => $payment_setting->mollie_key,
        ];

        $mollie_payment = new AddonPaymentController();

        return $mollie_payment->pay_with_mollie($mollie_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_instamojo(Request $request)
    {

        $request->validate([
            'payable_amount' => 'required',
        ], [
            'payable_amount.required' => __('Amount is required'),
        ]);

        $payable_amount = $request->payable_amount;
        /** developer need to assign the amount here */
        $after_success_url = route('wallet.payment-addon-success');
        $after_faild_url = route('wallet.payment-addon-faild');

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

    public function payment_addon_success()
    {

        $payable_amount = Session::get('payable_amount');
        $gateway_name = Session::get('after_success_gateway');
        $transaction = Session::get('after_success_transaction');

        $auth_user = Auth::guard('web')->user();

        $new_wallet = new WalletHistory();
        $new_wallet->user_id = $auth_user->id;
        $new_wallet->amount = $payable_amount;
        $new_wallet->transaction_id = $transaction;
        $new_wallet->payment_gateway = $gateway_name;
        $new_wallet->payment_status = $gateway_name == 'Direct Bank' ? 'pending' : 'success';
        $new_wallet->save();

        if ($gateway_name != 'Direct Bank') {
            $wallet_balance = $auth_user->wallet_balance;
            $wallet_balance += $payable_amount;
            $auth_user->wallet_balance = $wallet_balance;
            $auth_user->save();

            Session::forget('after_success_url');
            Session::forget('after_faild_url');
            Session::forget('payable_amount');
            Session::forget('gateway_charge');
            Session::forget('currency_rate');
            Session::forget('after_success_gateway');
            Session::forget('after_success_transaction');

            $notification = __('Payment has done successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->route('wallet.wallet.index')->with($notification);
        } else {
            $notification = __('Your bank payment request has been send, please wait for admin approval');
            $notification = ['message' => $notification, 'alert-type' => 'success'];

            return redirect()->route('wallet.wallet.index')->with($notification);
        }
    }

    public function payment_addon_faild()
    {
        Session::forget('after_success_url');
        Session::forget('after_faild_url');
        Session::forget('payable_amount');
        Session::forget('gateway_charge');
        Session::forget('currency_rate');
        Session::forget('after_success_gateway');
        Session::forget('after_success_transaction');

        $notification = __('Payment faild, please try again');
        $notification = ['message' => $notification, 'alert-type' => 'error'];

        return redirect()->route('wallet.wallet.index')->with($notification);
    }
}
