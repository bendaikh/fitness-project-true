<?php

namespace Modules\Subscription\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\GetGlobalInformationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\BasicPayment\app\Http\Controllers\FrontPaymentController;
use Modules\Currency\app\Models\MultiCurrency;
use Modules\PaymentGateway\app\Http\Controllers\AddonPaymentController;
use Modules\Subscription\app\Models\SubscriptionPlan;

class PaymentController extends Controller
{
    use GetGlobalInformationTrait;

    public function index()
    {

        // plan id will be dynamic
        $plan = SubscriptionPlan::find(2);
        $payable_amount = $plan->plan_price;

        $basic_payment = $this->get_basic_payment_info();
        $payment_setting = $this->get_payment_gateway_info();

        $flutterwave_currency = MultiCurrency::where('id', $payment_setting->flutterwave_currency_id)->first();
        $paystack_currency = MultiCurrency::where('id', $payment_setting->paystack_currency_id)->first();

        $user = Auth::guard('web')->user();

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

        return view('subscription::payment')->with([
            'plan' => $plan,
            'basic_payment' => $basic_payment,
            'payable_amount' => $payable_amount,
            'payment_setting' => $payment_setting,
            'razorpay_credentials' => $razorpay_credentials,
            'mollie_credentials' => $mollie_credentials,
            'instamojo_credentials' => $instamojo_credentials,
            'flutterwave_credentials' => $flutterwave_credentials,
            'paystack_credentials' => $paystack_credentials,
            'user' => $user,
        ]);
    }

    public function pay_via_stripe(Request $request, $id)
    {

        $basic_payment = $this->get_basic_payment_info();

        $plan = SubscriptionPlan::find($id);

        $payable_amount = $plan->plan_price;

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $stripe_credentials = (object) [
            'stripe_key' => $basic_payment->stripe_key,
            'stripe_secret' => $basic_payment->stripe_secret,
        ];

        Session::put('subscription_plan_id', $id);

        $stripe_payment = new FrontPaymentController();

        return $stripe_payment->pay_with_stripe($request, $stripe_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_paypal($id)
    {

        $basic_payment = $this->get_basic_payment_info();

        $plan = SubscriptionPlan::find($id);

        $payable_amount = $plan->plan_price;

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $paypal_credentials = (object) [
            'paypal_client_id' => $basic_payment->paypal_client_id,
            'paypal_secret_key' => $basic_payment->paypal_secret_key,
            'paypal_account_mode' => $basic_payment->paypal_account_mode,
        ];

        Session::put('subscription_plan_id', $id);

        $paypal_payment = new FrontPaymentController();

        return $paypal_payment->pay_with_paypal($paypal_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_bank(Request $request, $id)
    {

        $plan = SubscriptionPlan::find($id);
        $payable_amount = $plan->plan_price;

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

        $user = Auth::guard('web')->user();

        Session::put('after_success_url', $after_success_url);
        Session::put('after_faild_url', $after_faild_url);
        Session::put('payable_amount', $payable_amount);
        Session::put('after_success_gateway', 'Direct Bank');
        Session::put('after_success_transaction', $request->bank_transaction);
        Session::put('subscription_plan_id', $id);

        return $this->payment_addon_success();
    }

    public function pay_via_razorpay(Request $request, $id)
    {

        $payment_setting = $this->get_payment_gateway_info();

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $razorpay_credentials = (object) [
            'razorpay_key' => $payment_setting->razorpay_key,
            'razorpay_secret' => $payment_setting->razorpay_secret,
        ];

        Session::put('subscription_plan_id', $id);

        $razorpay_payment = new AddonPaymentController();

        return $razorpay_payment->pay_with_razorpay($request, $razorpay_credentials, $request->payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_mollie(Request $request, $id)
    {

        $plan = SubscriptionPlan::find($id);
        $payable_amount = $plan->plan_price;

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

        $user = Auth::guard('web')->user();

        $payment_setting = $this->get_payment_gateway_info();

        $mollie_credentials = (object) [
            'mollie_key' => $payment_setting->mollie_key,
        ];

        Session::put('subscription_plan_id', $id);

        $mollie_payment = new AddonPaymentController();

        return $mollie_payment->pay_with_mollie($mollie_credentials, $payable_amount, $after_success_url, $after_faild_url, $user);
    }

    public function pay_via_instamojo($id)
    {

        $plan = SubscriptionPlan::find($id);

        $payable_amount = $plan->plan_price;

        $after_success_url = route('subscription.payment-addon-success');
        $after_faild_url = route('subscription.payment-addon-faild');

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
        $gateway_charge = Session::get('gateway_charge');
        $payable_with_charge = Session::get('payable_with_charge');
        $payable_currency = Session::get('payable_currency');
        $gateway_name = Session::get('after_success_gateway');
        $transaction = Session::get('after_success_transaction');

        /**write your project logic here after successfully payment, you can use above information if you need. */

        /**if gateway name == Direct Bank, payment status will be pending, after approval by admin, status will be success if($gateway_name == 'Direct Bank'){} */


        return view('subscription::payment_success');
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

        return redirect()->route('subscription.payment')->with($notification);
    }
}
