<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\app\Http\Controllers\CouponController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    Route::put('coupon/status/{id}', [CouponController::class, 'status'])->name('coupon.status');
    Route::resource('coupon', CouponController::class)->names('coupon');

    Route::get('coupon-history', [CouponController::class, 'coupon_history'])->name('coupon-history');
});
