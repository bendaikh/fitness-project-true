<?php

use Illuminate\Support\Facades\Route;
use Modules\Customer\app\Http\Controllers\CustomerController;

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
    Route::controller(CustomerController::class)->group(function () {

        Route::get('all-customers', 'index')->name('all-customers');
        Route::get('active-customers', 'active_customer')->name('active-customers');
        Route::get('non-verified-customers', 'non_verified_customers')->name('non-verified-customers');
        Route::get('banned-customers', 'banned_customers')->name('banned-customers');
        Route::get('customer-show/{id}', 'show')->name('customer-show');
        Route::put('customer-info-update/{id}', 'update')->name('customer-info-update');
        Route::put('customer-password-change/{id}', 'password_change')->name('customer-password-change');
        Route::post('send-banned-request/{id}', 'send_banned_request')->name('send-banned-request');
        Route::post('send-verify-request/{id}', 'send_verify_request')->name('send-verify-request');
        Route::post('send-verify-request-to-all', 'send_verify_request_to_all')->name('send-verify-request-to-all');
        Route::post('send-mail-to-customer/{id}', 'send_mail_to_customer')->name('send-mail-to-customer');
        Route::get('send-bulk-mail', 'send_bulk_mail')->name('send-bulk-mail');
        Route::post('send-unbanned-request/{id}', 'send_unbanned_request')->name('send-unbanned-request');
        Route::post('send-bulk-mail-to-all', 'send_bulk_mail_to_all')->name('send-bulk-mail-to-all');
        Route::delete('customer-delete/{id}', 'destroy')->name('customer-delete');

        Route::put('customer/status/{id}', 'customerStatus')->name('customer.status');
    });
});
