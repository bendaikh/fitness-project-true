<?php

use Illuminate\Support\Facades\Route;
use Modules\CustomMenu\app\Http\Controllers\CustomMenuController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {
    Route::get('menu', [CustomMenuController::class,'index'])->name('custom-menu.index');
    Route::post('name/update', [CustomMenuController::class,'updateMenuName'])->name('menu-name.update');
    Route::post('menu/update', [CustomMenuController::class,'updateMenu'])->name('custom-menu.update');

    // Routes for menu items
    Route::post('menu/items/create', [CustomMenuController::class,'addMenuItem'])->name('custom-menu.items.create');
    Route::post('menu/items/update', [CustomMenuController::class,'updateMenuItem'])->name('custom-menu.items.update');
    Route::delete('menu/items/destroy/{id}', [CustomMenuController::class,'deleteMenuItem'])->name('custom-menu.items.delete');
});