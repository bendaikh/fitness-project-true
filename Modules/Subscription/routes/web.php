<?php

use Illuminate\Support\Facades\Route;
use Modules\Subscription\app\Http\Controllers\Admin\PurchaseController;
use Modules\Subscription\app\Http\Controllers\Admin\SubscriptionPlanController;
use Modules\Subscription\app\Http\Controllers\PaymentController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    Route::put('subscription-plan/status/{id}', [SubscriptionPlanController::class, 'status'])->name('subscription-plan.status');
    Route::resource('subscription-plan', SubscriptionPlanController::class)->names('subscription-plan');
    Route::get('/plan-option/{id}', [SubscriptionPlanController::class, 'plan_option'])->name('plan-option');
    Route::post('/store-plan-option', [SubscriptionPlanController::class, 'store_plan_option'])->name('store-plan-option');
    Route::put('/update-plan-option/{id}', [SubscriptionPlanController::class, 'update_plan_option'])->name('update-plan-option');
    Route::delete('/delete-plan-option/{id}', [SubscriptionPlanController::class, 'delete_plan_option'])->name('delete-plan-option');

    Route::controller(PurchaseController::class)->group(function () {

        Route::get('/plan-transaction-history', 'index')->name('plan-transaction-history');
        Route::get('/pending-plan-transaction', 'pending_payment')->name('pending-plan-transaction');
        Route::get('/subscription-history', 'subscription_history')->name('subscription-history');
        Route::put('/plan-renew/{id}', 'plan_renew')->name('plan-renew');

        Route::get('/purchase-history-show/{id}', 'show')->name('purchase-history-show');
        Route::put('/approved-plan-payment/{id}', 'approved_plan_payment')->name('approved-plan-payment');
        Route::delete('/delete-plan-payment/{id}', 'delete_plan_payment')->name('delete-plan-payment');
    });
});

Route::group(['as' => 'subscription.', 'prefix' => 'subscription', 'middleware' => []], function () {

    Route::controller(PaymentController::class)->group(function () {

        Route::get('/payment', 'index')->name('payment');
        Route::post('/pay-via-stripe/{id}', 'pay_via_stripe')->name('pay-via-stripe');
        Route::get('/pay-via-paypal/{id}', 'pay_via_paypal')->name('pay-via-paypal');

        Route::get('/pay-via-paypal/{id}', 'pay_via_paypal')->name('pay-via-paypal');
        Route::post('/pay-via-bank/{id}', 'pay_via_bank')->name('pay-via-bank');

        Route::post('/pay-via-razorpay/{id}', 'pay_via_razorpay')->name('pay-via-razorpay');
        Route::get('/pay-via-mollie/{id}', 'pay_via_mollie')->name('pay-via-mollie');
        Route::get('/pay-via-instamojo/{id}', 'pay_via_instamojo')->name('pay-via-instamojo');

        Route::get('/payment-addon-success', [PaymentController::class, 'payment_addon_success'])->name('payment-addon-success');
        Route::get('/payment-addon-faild', [PaymentController::class, 'payment_addon_faild'])->name('payment-addon-faild');
    });
});
