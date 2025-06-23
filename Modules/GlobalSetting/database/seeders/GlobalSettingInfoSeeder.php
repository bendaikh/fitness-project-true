<?php

namespace Modules\GlobalSetting\database\seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\app\Models\Setting;

class GlobalSettingInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();

        $setting_data = [
            'home_theme' => 'all',
            'app_name' => 'WebSolutionUs',
            'version' => '1.2.0',
            'admin_logo' => 'uploads/website-images/admin_logo.png',
            'logo' => 'uploads/website-images/logo.png',
            'timezone' => 'Asia/Dhaka',
            'admin_favicon' => 'uploads/website-images/admin_favicon.png',
            'favicon' => 'uploads/website-images/favicon.png',
            'invoice_logo' => 'website/images/invoice_logo.png',
            'cookie_status' => 'active',
            'border' => 'normal',
            'corners' => 'thin',
            'background_color' => '#184dec',
            'text_color' => '#fafafa',
            'border_color' => '#0a58d6',
            'btn_bg_color' => '#fffceb',
            'btn_text_color' => '#222758',
            'link' => '#',
            'link_text' => 'More Info',
            'btn_text' => 'Yes',
            'message' => 'This website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it. The latter will be set only upon approval.',
            'copyright_text' => 'this is copyright text',
            'recaptcha_site_key' => '6LeQCfwjAAAoKX9eg',
            'recaptcha_secret_key' => '6LeQCfwjAMsR',
            'recaptcha_status' => 'inactive',
            'tawk_chat_link' => 'chat_link',
            'tawk_status' => 'active',
            'google_analytic_status' => 'active',
            'google_analytic_id' => 'google_analytic_id',
            'pixel_status' => 'inactive',
            'pixel_app_id' => 'pixel_app_id',
            'facebook_login_status' => 'active',
            'facebook_app_id' => 'facebook_app_id',
            'facebook_app_secret' => 'facebook_app_secret',
            'facebook_redirect_url' => 'facebook_redirect_url',
            'google_login_status' => 'inactive',
            'gmail_client_id' => 'google_client_id',
            'gmail_secret_id' => 'google_secret_id',
            'gmail_redirect_url' => 'google_redirect_url',
            'default_avatar' => 'uploads/website-images/default-avatar.png',
            'breadcrumb_image' => 'uploads/website-images/breadcrumb-image.jpg',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_sender_email' => 'sender@gmail.com',
            'mail_username' => '58784e2a1e8e06',
            'mail_password' => '266052f6bf04bf',
            'mail_port' => '2525',
            'mail_encryption' => 'tls',
            'mail_sender_name' => 'WebSolutionUs',
            'contact_message_receiver_mail' => 'receiver@gmail.com',
            'pusher_app_id' => 'pusher_app_id',
            'pusher_app_key' => 'pusher_app_key',
            'pusher_app_secret' => 'pusher_app_secret',
            'pusher_app_cluster' => 'pusher_app_cluster',
            'pusher_status' => 'active',
            'club_point_rate' => 1,
            'club_point_status' => 'active',
            'maintenance_mode' => 0,
            'maintenance_image' => '',
            'maintenance_title' => 'Website Under maintenance',
            'maintenance_description' => '<p>We are currently performing maintenance on our website to<br>improve your experience. Please check back later.</p>',
            'last_update_date' => date('Y-m-d H:i:s'),
            'is_queable' => 'inactive',

            'primary_color' => '#eefb13',
            'secondary_color' => '#0e0e55',
            'common_color_one' => '#171718',
            'common_color_two' => '#bebec9',
            'common_color_three' => '#737382',
            'common_color_four' => '#eff0f3',
            'common_color_five' => '#272732',
            'common_color_six' => '#f5980c',

        ];

        foreach ($setting_data as $index => $setting_item) {
            $new_item = new Setting();
            $new_item->key = $index;
            $new_item->value = $setting_item;
            $new_item->save();
        }
    }
}
