<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\app\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    if (isShopActive()) {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('orders');
            Route::get('orders/pending', 'pending_order')->name('pending-orders');
            Route::post('/order-payment-reject/{id}', 'order_payment_reject')->name('order-payment-reject');
            Route::post('/order-payment-approved/{id}', 'order_payment_approved')->name('order-payment-approved');
            Route::delete('/order-delete/{id}', 'destroy')->name('order-delete');
            Route::get('order/payment/pending', 'pending_payment')->name('pending-payment');
            Route::get('order/payment/rejected', 'rejected_payment')->name('rejected-payment');
            Route::post('order/status/', 'orderStatus')->name('order.status');
            Route::get('/order-reject/{id}', 'orderReject')->name('order.reject');
            Route::get('/order-accepted/{id}', 'orderAccepted')->name('order.accepted');

            Route::get('orders/progress', 'progressOrder')->name('progress-order');
            Route::get('orders/on-the-way', 'onTheWay')->name('order.on-the-way');
            Route::get('orders/delivered', 'deliveredOrder')->name('order.delivered');
            Route::get('orders/declined', 'declinedOrder')->name('order.declined');
            Route::get('orders/cash-on-delivery', 'cashOnDelivery')->name('order.cash-on-delivery');
            Route::get('orders/show/{id}', 'show')->name('order.show');
        });
    }
});
