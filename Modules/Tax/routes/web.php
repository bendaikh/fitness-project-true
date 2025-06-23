<?php

use Illuminate\Support\Facades\Route;
use Modules\Tax\app\Http\Controllers\TaxController;

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
        Route::resource('tax', TaxController::class)->names('tax');
        Route::put('tax/status/{id}', [TaxController::class, 'taxStatus'])->name('tax.status');
    }
});
