<?php

use Illuminate\Support\Facades\Route;
use Modules\Wallet\app\Http\Controllers\Admin\WalletController as AdminWalletController;
use Modules\Wallet\app\Http\Controllers\WalletController;

Route::group(['as' => 'wallet.', 'prefix' => 'wallet', 'middleware' => ['auth:web']], function () {
    Route::resource('wallet', WalletController::class)->names('wallet');

    Route::controller(WalletController::class)->group(function () {

        Route::post('pay-via-stripe', 'pay_via_stripe')->name('pay-via-stripe');

        Route::get('pay-via-paypal', 'pay_via_paypal')->name('pay-via-paypal');

        Route::post('pay-via-bank', 'pay_via_bank')->name('pay-via-bank');

        Route::post('pay-via-razorpay', 'pay_via_razorpay')->name('pay-via-razorpay');

        Route::get('pay-via-mollie', 'pay_via_mollie')->name('pay-via-mollie');
        Route::get('pay-via-instamojo', 'pay_via_instamojo')->name('pay-via-instamojo');

        Route::get('/payment-addon-success', 'payment_addon_success')->name('payment-addon-success');
        Route::get('/payment-addon-faild', 'payment_addon_faild')->name('payment-addon-faild');
    });
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    Route::controller(AdminWalletController::class)->group(function () {

        Route::get('/wallet-history', 'index')->name('wallet-history');
        Route::get('/pending-wallet-payment', 'pending_wallet_payment')->name('pending-wallet-payment');
        Route::get('/rejected-wallet-payment', 'rejected_wallet_payment')->name('rejected-wallet-payment');
        Route::get('/show-wallet-history/{id}', 'show')->name('show-wallet-history');
        Route::delete('/delete-wallet-history/{id}', 'destroy')->name('delete-wallet-history');
        Route::post('/rejected-wallet-request/{id}', 'rejected_wallet_request')->name('rejected-wallet-request');
        Route::post('/approved-wallet-request/{id}', 'approved_wallet_request')->name('approved-wallet-request');
    });
});
