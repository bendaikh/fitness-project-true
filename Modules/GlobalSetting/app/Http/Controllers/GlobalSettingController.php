<?php

namespace Modules\GlobalSetting\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Database\Seeders\AdminInfoSeeder;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\BasicPayment\database\seeders\BasicPaymentInfoSeeder;
use Modules\Currency\database\seeders\CurrencySeeder;
use Modules\GlobalSetting\app\Models\CustomCode;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\GlobalSetting\app\Models\SeoSetting;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\GlobalSetting\database\seeders\CustomPaginationSeeder;
use Modules\GlobalSetting\database\seeders\EmailTemplateSeeder;
use Modules\GlobalSetting\database\seeders\GlobalSettingInfoSeeder;
use Modules\GlobalSetting\database\seeders\SeoInfoSeeder;
use Modules\Installer\app\Models\Configuration;
use Modules\Language\database\seeders\LanguageSeeder;
use Modules\PaymentGateway\database\seeders\PaymentGatewaySeeder;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use ZipArchive;

class GlobalSettingController extends Controller
{
    protected $cachedSetting;

    public function __construct()
    {
        $this->cachedSetting = Cache::get('setting');
        $this->middleware('auth:admin');
    }

    public function general_setting()
    {
        checkAdminHasPermissionAndThrowException('setting.view');
        $custom_paginations = CustomPagination::all();

        return view('globalsetting::settings.index', compact('custom_paginations'));
    }

    public function update_general_setting(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        $request->validate([
            'home_theme' => 'required',
            'shop_status' => 'required',
            'app_name' => 'required',
            'timezone' => 'required',
            'is_queable' => 'required|in:active,inactive',
        ], [
            'home_theme' => __('Theme is required'),
            'shop_status' => __('Shop status is required'),
            'app_name' => __('App name is required'),
            'timezone' => __('Timezone is required'),
            'is_queable' => __('Queue is required'),
            'is_queable.in' => __('Queue is invalid'),
        ]);

        Setting::where('key', 'home_theme')->update(['value' => $request->home_theme]);
        Setting::where('key', 'app_name')->update(['value' => $request->app_name]);
        Setting::where('key', 'timezone')->update(['value' => $request->timezone]);

        Setting::where('key', 'is_queable')->update(['value' => $request->is_queable]);

        Setting::where('key', 'contact_message_receiver_mail')->update(['value' => $request->contact_message_receiver_mail]);

        $shop = Setting::where('key', 'shop_status')->first();
        if ($shop) {
            Setting::where('key', 'shop_status')->update(['value' => $request->shop_status]);
        } else {
            Setting::create(['key' => 'shop_status', 'value' => $request->shop_status]);
        }

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_logo_favicon(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        if ($request->file('logo')) {
            $file_name = file_upload($request->logo, $this->cachedSetting?->logo, 'uploads/custom-images/');
            Setting::where('key', 'logo')->update(['value' => $file_name]);
        }
        if ($request->file('favicon')) {
            $file_name = file_upload($request->favicon, $this->cachedSetting?->favicon, 'uploads/custom-images/');
            Setting::where('key', 'favicon')->update(['value' => $file_name]);
        }
        if ($request->file('admin_logo')) {
            $file_name = file_upload($request->admin_logo, $this->cachedSetting?->admin_logo, 'uploads/custom-images/');
            Setting::where('key', 'admin_logo')->update(['value' => $file_name]);
        }

        if ($request->file('admin_favicon')) {
            $file_name = file_upload($request->admin_favicon, $this->cachedSetting?->admin_favicon, 'uploads/custom-images/');
            Setting::where('key', 'admin_favicon')->update(['value' => $file_name]);
        }

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_site_color(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'primary_color' => 'required',
            'secondary_color' => 'required',
            'common_color_one' => 'required',
            'common_color_two' => 'required',
            'common_color_three' => 'required',
            'common_color_four' => 'required',
            'common_color_five' => 'required',
            'common_color_six' => 'required',

        ], [
            'primary_color.required' => __('Primary color field is required'),
            'secondary_color.required' => __('Secondary color field is required'),
            'common_color_one.required' => __('Common color one field is required'),
            'common_color_two.required' => __('Common color two field is required'),
            'common_color_three.required' => __('Common color three field is required'),
            'common_color_four.required' => __('Common color four field is required'),
            'common_color_five.required' => __('Common color five field is required'),
            'common_color_six.required' => __('Common color six field is required'),
        ]);

        Setting::updateOrCreate(['key' => 'primary_color'], ['value' => $request->primary_color]);
        Setting::updateOrCreate(['key' => 'secondary_color'], ['value' => $request->secondary_color]);
        Setting::updateOrCreate(['key' => 'common_color_one'], ['value' => $request->common_color_one]);
        Setting::updateOrCreate(['key' => 'common_color_two'], ['value' => $request->common_color_two]);
        Setting::updateOrCreate(['key' => 'common_color_three'], ['value' => $request->common_color_three]);
        Setting::updateOrCreate(['key' => 'common_color_four'], ['value' => $request->common_color_four]);
        Setting::updateOrCreate(['key' => 'common_color_five'], ['value' => $request->common_color_five]);
        Setting::updateOrCreate(['key' => 'common_color_six'], ['value' => $request->common_color_six]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_cookie_consent(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'cookie_status' => 'required',
            'border' => 'required',
            'corners' => 'required',
            'background_color' => 'required',
            'text_color' => 'required',
            'border_color' => 'required',
            'btn_bg_color' => 'required',
            'btn_text_color' => 'required',
            'link_text' => 'required',
            'btn_text' => 'required',
            'message' => 'required',
        ], [
            'cookie_status.required' => __('Status is required'),
            'border.required' => __('Border is required'),
            'corners.required' => __('Corner is required'),
            'background_color.required' => __('Background color is required'),
            'text_color.required' => __('Text color is required'),
            'border_color.required' => __('Border Color is required'),
            'btn_bg_color.required' => __('Button color is required'),
            'btn_text_color.required' => __('Button text color is required'),
            'link_text.required' => __('Link text is required'),
            'btn_text.required' => __('Button text is required'),
            'message.required' => __('Message is required'),
        ]);

        Setting::where('key', 'cookie_status')->update(['value' => $request->cookie_status]);
        Setting::where('key', 'border')->update(['value' => $request->border]);
        Setting::where('key', 'corners')->update(['value' => $request->corners]);
        Setting::where('key', 'background_color')->update(['value' => $request->background_color]);
        Setting::where('key', 'text_color')->update(['value' => $request->text_color]);
        Setting::where('key', 'border_color')->update(['value' => $request->border_color]);
        Setting::where('key', 'btn_bg_color')->update(['value' => $request->btn_bg_color]);
        Setting::where('key', 'btn_text_color')->update(['value' => $request->btn_text_color]);
        Setting::where('key', 'link_text')->update(['value' => $request->link_text]);
        Setting::where('key', 'link')->update(['value' => $request->link]);
        Setting::where('key', 'btn_text')->update(['value' => $request->btn_text]);
        Setting::where('key', 'message')->update(['value' => $request->message]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_custom_pagination(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        foreach ($request->quantities as $index => $quantity) {
            if ($request->quantities[$index] == '') {
                $notification = [
                    'message' => __('Every field are required'),
                    'alert-type' => 'error',
                ];

                return redirect()->back()->with($notification);
            }

            $custom_pagination = CustomPagination::find($request->ids[$index]);
            $custom_pagination->item_qty = $request->quantities[$index];
            $custom_pagination->save();
        }

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_default_avatar(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        if ($request->file('default_avatar')) {
            $file_name = file_upload($request->default_avatar, $this->cachedSetting?->default_avatar, 'uploads/website-images/');
            Setting::where('key', 'default_avatar')->update(['value' => $file_name]);
        }

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_breadcrumb(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        if ($request->file('breadcrumb_image')) {
            $file_name = file_upload($request->breadcrumb_image, $this->cachedSetting?->breadcrumb_image, 'uploads/custom-images/');
            Setting::where('key', 'breadcrumb_image')->update(['value' => $file_name]);
        }

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_website_setting(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        foreach ($request->all() as $key => $value) {
            if ($key == '_token' || $key == '_method') {
                continue;
            }
            if ($key == 'website_short_description' || $key == 'website_phone' || $key == 'website_address' || $key == 'website_email' || $key == 'website_facebook_url' || $key == 'website_instagram_url' || $key == 'website_twitter_url' || $key == 'website_linkedin_url') {
                $val = Setting::where('key', $key)->update(['value' => $value]);
                if (!$val && $value != '') {
                    Setting::create([
                        'key' => $key,
                        'value' => $value
                    ]);
                }
            }
        }

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
    public function update_copyright_text(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'copyright_text' => 'required',
        ], [
            'copyright_text' => __('Copyright Text is required'),
        ]);
        Setting::where('key', 'copyright_text')->update(['value' => $request->copyright_text]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function crediential_setting()
    {
        checkAdminHasPermissionAndThrowException('setting.view');

        return view('globalsetting::credientials.index');
    }

    public function update_google_captcha(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'recaptcha_site_key' => 'required',
            'recaptcha_secret_key' => 'required',
            'recaptcha_status' => 'required',
        ], [
            'recaptcha_site_key.required' => __('Site key is required'),
            'recaptcha_secret_key.required' => __('Secret key is required'),
            'recaptcha_status.required' => __('Status is required'),
        ]);

        Setting::where('key', 'recaptcha_site_key')->update(['value' => $request->recaptcha_site_key]);
        Setting::where('key', 'recaptcha_secret_key')->update(['value' => $request->recaptcha_secret_key]);
        Setting::where('key', 'recaptcha_status')->update(['value' => $request->recaptcha_status]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_tawk_chat(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'tawk_status' => 'required',
            'tawk_chat_link' => 'required',
        ], [
            'tawk_status.required' => __('Status is required'),
            'tawk_chat_link.required' => __('Chat link is required'),
        ]);

        if (strpos($request->tawk_chat_link, 'embed.tawk.to') !== false) {
            $embedUrl = $request->tawk_chat_link;
        } elseif (strpos($request->tawk_chat_link, 'tawk.to/chat') !== false) {
            $embedUrl = str_replace('tawk.to/chat', 'embed.tawk.to', $request->tawk_chat_link);
        } else {
            $embedUrl = "https://embed.tawk.to/" . $request->tawk_chat_link;
        }

        Setting::where('key', 'tawk_status')->update(['value' => $request->tawk_status]);
        Setting::where('key', 'tawk_chat_link')->update(['value' => $embedUrl]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_google_analytic(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'google_analytic_status' => 'required',
            'google_analytic_id' => 'required',
        ], [
            'google_analytic_status.required' => __('Status is required'),
            'google_analytic_id.required' => __('Analytic id is required'),
        ]);

        Setting::where('key', 'google_analytic_status')->update(['value' => $request->google_analytic_status]);
        Setting::where('key', 'google_analytic_id')->update(['value' => $request->google_analytic_id]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_facebook_pixel(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate([
            'pixel_status' => 'required',
            'pixel_app_id' => 'required',
        ], [
            'pixel_status.required' => __('Status is required'),
            'pixel_app_id.required' => __('App id is required'),
        ]);

        Setting::where('key', 'pixel_status')->update(['value' => $request->pixel_status]);
        Setting::where('key', 'pixel_app_id')->update(['value' => $request->pixel_app_id]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_social_login(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $rules = [
            'gmail_client_id' => 'required',
            'gmail_secret_id' => 'required',
        ];
        $customMessages = [
            'google_login_status.required' => __('Google is required'),
            'gmail_client_id.required' => __('Google client is required'),
            'gmail_secret_id.required' => __('Google secret is required'),
        ];
        $request->validate($rules, $customMessages);
        Setting::where('key', 'google_login_status')->update(['value' => $request->google_login_status]);
        Setting::where('key', 'gmail_client_id')->update(['value' => $request->gmail_client_id]);
        Setting::where('key', 'gmail_secret_id')->update(['value' => $request->gmail_secret_id]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function seo_setting()
    {
        checkAdminHasPermissionAndThrowException('setting.view');
        $pages = SeoSetting::all();

        return view('globalsetting::seo_setting', compact('pages'));
    }

    public function update_seo_setting(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $rules = [
            'seo_title' => 'required',
            'seo_description' => 'required',
        ];
        $customMessages = [
            'seo_title.required' => __('SEO title is required'),
            'seo_description.required' => __('SEO description is required'),
        ];
        $request->validate($rules, $customMessages);

        $page = SeoSetting::find($id);
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->save();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function cache_clear()
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        return view('globalsetting::cache_clear');
    }

    public function cache_clear_confirm()
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        Artisan::call('optimize:clear');

        $notification = __('Cache cleared successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function database_clear()
    {
        checkAdminHasPermissionAndThrowException('setting.view');

        return view('globalsetting::database_clear');
    }

    public function database_clear_success(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $request->validate(['password' => 'required'], ['password.required' => __('Password is required')]);

        if (Hash::check($request->password, auth('admin')->user()->password)) {
            // truncate all model here
            Artisan::call('migrate:fresh', [
                '--force' => true,
            ]);

            Artisan::call('db:seed', ['--force' => true]);

            // optimize clear
            Artisan::call('optimize:clear');


            // update configuration of installer
            Configuration::where('config', 'setup_complete')->update(['value' => 1]);
            Configuration::where('config', 'setup_stage')->update(['value' => 5]);

            // delete all files
            $this->deleteFiles();

            $notification = __('Database Cleared Successfully');
            $notification = ['message' => $notification, 'alert-type' => 'success'];
        } else {
            $notification = __('Passwords do not match.');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
        }
        return redirect()->back()->with($notification);
    }

    public function deleteFiles(): void
    {
        $path = public_path('uploads');

        // delete this folder
        File::deleteDirectory($path . '/custom-images');
        File::deleteDirectory($path . '/media');
        File::deleteDirectory($path . '/files');

        // create directory and give permission
        File::makeDirectory($path, 0777, true, true);
    }

    public function put_setting_cache()
    {
        $setting_info = Setting::get();

        $setting = [];
        foreach ($setting_info as $setting_item) {
            $setting[$setting_item->key] = $setting_item->value;
        }

        $setting = (object) $setting;

        Cache::put('setting', $setting);
    }

    public function customCode($type)
    {
        checkAdminHasPermissionAndThrowException('setting.view');
        $customCode = CustomCode::first();
        if (!$customCode) {
            $customCode = new CustomCode();
            $customCode->css = "/* write your css code here without the style tag *\\";
            $customCode->javascript = '//write your javascript here without the script tag';
            $customCode->header_javascript = '//write your javascript here without the script tag';
            $customCode->save();
        }
        return view('globalsetting::custom_code_' . $type, compact('customCode'));
    }

    public function customCodeUpdate(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $validatedData = $request->validate([
            'css'               => 'sometimes',
            'javascript'        => 'sometimes',
            'header_javascript' => 'sometimes',
        ]);

        $customCode = CustomCode::firstOrNew();
        $customCode->fill($validatedData);
        $customCode->save();

        Cache::forget('customCode');

        $notification = __('Updated Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function update_maintenance_mode_status()
    {
        checkAdminHasPermissionAndThrowException('setting.update');
        $status = $this->cachedSetting?->maintenance_mode == 1 ? 0 : 1;

        Setting::where('key', 'maintenance_mode')->update(['value' => $status]);

        $this->put_setting_cache();

        return response()->json([
            'success' => true,
            'message' => __('Updated Successfully'),
        ]);
    }

    public function update_maintenance_mode(Request $request)
    {
        checkAdminHasPermissionAndThrowException('setting.update');

        $request->validate([
            'maintenance_title' => 'required',
            'maintenance_image' => 'nullable|image|max:2048',
            'maintenance_description' => 'required',
        ], [
            'maintenance_title' => __('Maintenance Mode Title is required'),
            'maintenance_description' => __('Maintenance Mode Description is required'),
        ]);

        if ($request->hasFile('maintenance_image')) {
            $imagePath = file_upload($request->maintenance_image, $this->cachedSetting?->maintenance_image, 'uploads/custom-images/');
            Setting::where('key', 'maintenance_image')->update(['value' => $imagePath]);
        }

        Setting::where('key', 'maintenance_title')->update(['value' => $request->maintenance_title]);
        Setting::where('key', 'maintenance_description')->update(['value' => $request->maintenance_description]);

        $this->put_setting_cache();

        $notification = __('Update Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    public function systemUpdate()
    {
        $zipLoaded = extension_loaded('zip');
        $updateAvailablity = null;

        if (request('type') == 'check') {
            Cache::forget('update_url');
        }

        if (function_exists('showUpdateAvailablity')) {
            $this->put_setting_cache();
            $updateAvailablity = showUpdateAvailablity();
        }

        $updateFileDetails = false;
        $files = false;
        $uploadFileSize = false;

        $zipFilePath = public_path('upload/update.zip');
        if ($updateFileDetails = File::exists($zipFilePath)) {
            $uploadFileSize = File::size($zipFilePath);

            $files = $this->getFilesFromZip($zipFilePath);
        }

        $upload_max_filesize = $this->convertPHPSizeToBytes(ini_get('upload_max_filesize'));
        $post_max_size = $this->convertPHPSizeToBytes(ini_get('post_max_size'));
        $max_upload_size = min($upload_max_filesize, $post_max_size);


        return view('globalsetting::auto-update', compact('updateAvailablity', 'updateFileDetails', 'uploadFileSize', 'files', 'zipLoaded', 'max_upload_size'));
    }

    public function systemUpdateStore(Request $request)
    {
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        $save = $receiver->receive();
        if ($save->isFinished()) {
            $file = $save->getFile();

            $mime = $file->getClientOriginalExtension();
            if ($mime == 'zip') {
                $filePath = public_path('upload/update.zip');
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $file->move(public_path('upload'), 'update.zip');
            }

            return response()->json(['status' => true], 200);
        }
        $handler = $save->handler();
        return response()->json([
            "done"   => $handler->getPercentageDone(),
            'status' => true,
        ]);
    }

    private function convertPHPSizeToBytes($size)
    {
        $suffix = strtoupper(substr($size, -1));
        $value = (int) substr($size, 0, -1);
        switch ($suffix) {
            case 'G':
                $value *= 1024 * 1024 * 1024;
                break;
            case 'M':
                $value *= 1024 * 1024;
                break;
            case 'K':
                $value *= 1024;
                break;
        }
        return $value;
    }
    private function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $index = floor(log($size, 1024));
        $formattedSize = $size / pow(1024, $index);
        return round($formattedSize, $precision) . ' ' . $units[$index];
    }

    public function systemUpdateRedirect()
    {
        $zipFilePath = public_path('upload/update.zip');

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath) !== true) {
            File::delete($zipFilePath);
            $notification = __('Corrupted Zip File');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            $zip->close();
            return redirect()->back()->with($notification);
        }

        if (!$this->isFirstDirUpload($zipFilePath)) {
            $notification = __('Invalid Update File Structure');
            $notification = ['message' => $notification, 'alert-type' => 'error'];
            $zip->close();
            return redirect()->back()->with($notification);
        }

        $zip->close();

        $this->deleteFolderAndFiles(base_path('update'));

        if ($zip->open($zipFilePath) === true) {
            $zip->extractTo(base_path());
            $zip->close();
        }

        return redirect(url('/update'));
    }

    public function systemUpdateDelete()
    {
        $zipFilePath = public_path('upload/update.zip');
        File::delete($zipFilePath);

        $this->deleteFolderAndFiles(base_path('update'));

        $notification = __('Deleted Successfully');
        $notification = ['message' => $notification, 'alert-type' => 'success'];
        return back()->with($notification);
    }

    private function getFilesFromZip($zipFilePath)
    {
        $files = [];
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath) === true) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileInfo = $zip->statIndex($i);
                $files[] = $fileInfo['name'];
            }
        }
        $zip->close();
        return $files;
    }

    private function deleteFolderAndFiles($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) {
            $path = $dir . '/' . $file;

            if (is_dir($path)) {
                $this->deleteFolderAndFiles($path);
            } else {
                unlink($path);
            }
        }

        rmdir($dir);
    }

    private function isFirstDirUpload($zipFilePath)
    {
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath) === TRUE) {
            $firstDir = null;

            for ($i = 0; $i < $zip->numFiles; $i++) {
                $fileInfo = $zip->statIndex($i);
                $filePathParts = explode('/', $fileInfo['name']);

                if (count($filePathParts) > 1) {
                    $firstDir = $filePathParts[0];
                    break;
                }
            }

            $zip->close();
            return $firstDir === "update";
        }

        $zip->close();
        return false;
    }
}
