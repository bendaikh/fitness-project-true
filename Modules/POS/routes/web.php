<?php

use Illuminate\Support\Facades\Route;
use Modules\POS\app\Http\Controllers\POSController;

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
        Route::prefix('pos')->group(function () {
            Route::get('/', [POSController::class, 'index'])->name('pos');
            Route::get('/load-products', [POSController::class, 'load_products'])->name('load-products');
            Route::get('/load-product-modal/{id}', [POSController::class, 'load_product_modal'])->name('load-product-modal');
            Route::get('/pos/load-customer-address/{id}', [POSController::class, 'load_customer_address'])->name('load-customer-address');
            Route::get('/add-to-cart', [POSController::class, 'add_to_cart'])->name('add-to-cart');
            Route::get('/cart-quantity-update', [POSController::class, 'cart_quantity_update'])->name('cart-quantity-update');
            Route::get('/remove-cart-item/{id}', [POSController::class, 'remove_cart_item'])->name('remove-cart-item');
            Route::get('/cart-clear', [POSController::class, 'cart_clear'])->name('cart-clear');
            Route::get('/pos-cart-item-details/{id}', [POSController::class, 'posCartItemDetails'])->name('pos-cart-item-details');
            Route::post('/create-new-customer', [POSController::class, 'create_new_customer'])->name('create-new-customer');
            Route::post('/create-new-address', [POSController::class, 'create_new_address'])->name('create-new-address');
            Route::post('/place-order', [POSController::class, 'place_order'])->name('place-order');

            Route::get('/check-cart-restaurant/{id}', [POSController::class, 'check_cart_restaurant'])->name('check-cart-restaurant');
            Route::get('/modal-cart-clear', [POSController::class, 'modalClearCart'])->name('modal-cart-clear');
        });

        Route::get('apply-coupon', [POSController::class, 'applyCoupon'])->name('apply-coupon');
    }
});
