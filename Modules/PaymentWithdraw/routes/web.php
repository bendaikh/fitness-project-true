<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentWithdraw\app\Http\Controllers\Admin\WithdrawMethodController as WithdrawMethodController;
use Modules\PaymentWithdraw\app\Http\Controllers\PaymentWithdrawController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {
    Route::resource('withdraw-method', WithdrawMethodController::class)->names('withdraw-method');

    Route::get('withdraw-list', [WithdrawMethodController::class, 'withdraw_list'])->name('withdraw-list');
    Route::get('pending-withdraw-list', [WithdrawMethodController::class, 'pending_withdraw_list'])->name('pending-withdraw-list');
    Route::get('show-withdraw/{id}', [WithdrawMethodController::class, 'show_withdraw'])->name('show-withdraw');
    Route::put('approved-withdraw/{id}', [WithdrawMethodController::class, 'approved_withdraw'])->name('approved-withdraw');
    Route::delete('delete-withdraw/{id}', [WithdrawMethodController::class, 'destroy_withdraw'])->name('delete-withdraw');
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::resource('payment-withdraw', PaymentWithdrawController::class)->names('payment-withdraw');
});
