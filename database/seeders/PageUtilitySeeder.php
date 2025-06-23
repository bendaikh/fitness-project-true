<?php

namespace Database\Seeders;

use App\Models\PagesUtility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PageUtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'login_image' => 'uploads/custom-images/wsus-img-2024-06-06-11-29-23-2862.jpg',
            'footer_app_button_status' => 1,
            'cta_link' => 'callto:1234567890',
            'cta_icon' => 'fab fa-whatsapp',
            'register_image' => 'uploads/custom-images/wsus-img-2024-06-06-11-29-23-5244.jpg',
            'forget_password_image' => 'uploads/custom-images/wsus-img-2024-06-06-11-29-23-6942.jpg',
            'reset_password_image' => 'uploads/custom-images/wsus-img-2024-06-06-11-29-23-1272.jpg',
            'ios_app_link' => '#',
            'android_app_link' => '#',
            'price_range' => 2000,
        ];

        $page = PagesUtility::create($data);

        // Data for translation records
        $request = [
            'footer_copyright' => 'Copyright 2024 Fitnes All Rights Reserved',
            'cta_button' => 'Talk to a Specialist',
            'app_download_now_text' => 'Download Now',
        ];

        // Get all languages
        $languages = allLanguages();

        foreach ($languages as $language) {
            // Create translation records for each language
            $page->translations()->create([
                'lang_code' => $language->code,
                'footer_copyright' => $request['footer_copyright'],
                'cta_button' => $request['cta_button'],
                'app_download_now_text' => $request['app_download_now_text'],
            ]);
        }
    }
}
