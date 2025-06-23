<?php

use Illuminate\Support\Facades\Route;
use Modules\GlobalSetting\app\Http\Controllers\EmailSettingController;
use Modules\GlobalSetting\app\Http\Controllers\GlobalSettingController;
use Modules\GlobalSetting\app\Http\Controllers\ManageAddonController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin', 'translation']], function () {

    Route::controller(GlobalSettingController::class)->group(function () {

        Route::get('general-setting', 'general_setting')->name('general-setting');
        Route::put('update-general-setting', 'update_general_setting')->name('update-general-setting');
        Route::put('update-website-setting', 'update_website_setting')->name('update-website-setting');

        Route::put('update-logo-favicon', 'update_logo_favicon')->name('update-logo-favicon');
        Route::put('update-site-color', 'update_site_color')->name('update-site-color');
        Route::put('update-cookie-consent', 'update_cookie_consent')->name('update-cookie-consent');
        Route::put('update-custom-pagination', 'update_custom_pagination')->name('update-custom-pagination');
        Route::put('update-default-avatar', 'update_default_avatar')->name('update-default-avatar');
        Route::put('update-breadcrumb', 'update_breadcrumb')->name('update-breadcrumb');
        Route::put('update-copyright-text', 'update_copyright_text')->name('update-copyright-text');
        Route::put('update-maintenance-mode-status', 'update_maintenance_mode_status')->name('update-maintenance-mode-status');
        Route::put('update-maintenance-mode', 'update_maintenance_mode')->name('update-maintenance-mode');

        Route::get('seo-setting', 'seo_setting')->name('seo-setting');
        Route::put('update-seo-setting/{id}', 'update_seo_setting')->name('update-seo-setting');

        Route::get('crediential-setting', 'crediential_setting')->name('crediential-setting');
        Route::put('update-google-captcha', 'update_google_captcha')->name('update-google-captcha');
        Route::put('update-tawk-chat', 'update_tawk_chat')->name('update-tawk-chat');
        Route::put('update-google-analytic', 'update_google_analytic')->name('update-google-analytic');
        Route::put('update-facebook-pixel', 'update_facebook_pixel')->name('update-facebook-pixel');
        Route::put('update-social-login', 'update_social_login')->name('update-social-login');

        Route::get('cache-clear', 'cache_clear')->name('cache-clear');
        Route::post('cache-clear', 'cache_clear_confirm')->name('cache-clear-confirm');
        Route::get('database-clear', 'database_clear')->name('database-clear');
        Route::delete('database-clear-success', 'database_clear_success')->name('database-clear-success');

        Route::get('custom-code/{type}', 'customCode')->name('custom-code');
        Route::post('update-custom-code', 'customCodeUpdate')->name('update-custom-code');

        Route::get('system-update', 'systemUpdate')->name('system-update.index');
        Route::post('system-update/store', 'systemUpdateStore')->name('system-update.store');
        Route::post('system-update/redirect', 'systemUpdateRedirect')->name('system-update.redirect');
        Route::delete('system-update/delete', 'systemUpdateDelete')->name('system-update.delete');
    });



    Route::controller(EmailSettingController::class)->group(function () {

        Route::get('email-configuration', 'email_config')->name('email-configuration');
        Route::put('update-email-configuration', 'update_email_config')->name('update-email-configuration');

        Route::get('edit-email-template/{id}', 'edit_email_template')->name('edit-email-template');
        Route::put('update-email-template/{id}', 'update_email_template')->name('update-email-template');
    });

    Route::controller(ManageAddonController::class)->prefix('settings')->group(function () {
        Route::get('addons', 'index')->name('addons.view');
        Route::post('addons/verify', 'verifyAddon')->name('addons.verify');
        Route::get('addons/install', 'installAddon')->name('addons.install');
        Route::post('addons/update/{slug}', 'updateStatus')->name('addons.update.status');
        Route::post('addons/store', 'installStore')->name('addons.store');
        Route::post('addons/install', 'installProcessStart')->name('addons.install.start');
        Route::delete('addons/delete', 'deleteAddon')->name('addons.delete');
        Route::delete('addons/uninstall/{slug}', 'uninstallAddon')->name('addons.uninstall');
    });
});
