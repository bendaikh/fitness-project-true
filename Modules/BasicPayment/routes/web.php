<?php

use Illuminate\Support\Facades\Route;
use Modules\BasicPayment\app\Http\Controllers\PaymentController;
use Modules\BasicPayment\app\Http\Controllers\BasicPaymentController;
use Modules\BasicPayment\app\Http\Controllers\FrontPaymentController;
use Modules\BasicPayment\app\Http\Controllers\PaymentGatewayController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    Route::controller(BasicPaymentController::class)->group(function () {

        Route::get('basicpayment', 'basicpayment')->name('basicpayment');
        Route::put('update-stripe', 'update_stripe')->name('update-stripe');
        Route::put('update-paypal', 'update_paypal')->name('update-paypal');
        Route::put('update-bank-payment', 'update_bank_payment')->name('update-bank-payment');
    });

    Route::controller(PaymentGatewayController::class)->group(function () {
        Route::put('razorpay-update', 'razorpay_update')->name('razorpay-update');
        Route::put('flutterwave-update', 'flutterwave_update')->name('flutterwave-update');
        Route::put('paystack-update', 'paystack_update')->name('paystack-update');
        Route::put('mollie-update', 'mollie_update')->name('mollie-update');
        Route::put('instamojo-update', 'instamojo_update')->name('instamojo-update');
    });
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::controller(PaymentController::class)->group(function () {
        Route::post('place-order/{method}', 'placeOrder')->name('place.order');
        Route::get('payment', 'index')->name('payment');

        Route::get('payment-success', 'payment_success')->name('payment-success');
        Route::get('payment-failed', 'payment_failed')->name('payment-failed');

        Route::post('pay-via-bank', 'pay_via_bank')->name('pay-via-bank');
        Route::post('pay-via-free-gateway', 'pay_via_free_gateway')->name('pay-via-free-gateway');

        Route::get('pay-via-paypal', 'pay_via_paypal')->name('pay-via-paypal');
        Route::post('pay-via-stripe', 'pay_via_stripe')->name('pay-via-stripe');
        Route::get('pay-via-stripe', 'stripe_success')->name('stripe-success');

        Route::post('pay-via-razorpay', 'pay_via_razorpay')->name('pay-via-razorpay');

        Route::get('pay-via-mollie', 'pay_via_mollie')->name('pay-via-mollie');
        Route::get('mollie-payment-success', 'mollie_payment_success')->name('mollie-payment-success');

        Route::post('pay-via-flutterwave', 'flutterwave_payment')->name('pay-via-flutterwave');
        Route::get('pay-via-paystack', 'paystack_payment')->name('pay-via-paystack');

        Route::get('pay-via-instamojo', 'pay_via_instamojo')->name('pay-via-instamojo');
        Route::get('instamojo-success', 'instamojo_success')->name('instamojo-success');
    });
    Route::get('paypal-success-payment', [FrontPaymentController::class, 'paypal_success'])->name('paypal-success-payment');
});
