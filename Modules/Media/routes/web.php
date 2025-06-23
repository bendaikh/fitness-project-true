<?php

use Illuminate\Support\Facades\Route;
use Modules\Media\app\Http\Controllers\MediaController;

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

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['translation']], function () {
    Route::resource('media', MediaController::class)->names('media');
    Route::get('media/search/{keyword}', [MediaController::class, 'media_search'])->name('media.search');
    Route::delete('media/multi/delete', [MediaController::class, 'media_multi_delete'])->name('media.multi.delete');
    Route::post('media/select', [MediaController::class, 'media_select'])->name('media.select');
});
