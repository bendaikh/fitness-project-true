<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use App\Models\ProductBrandTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Language\app\Models\Language;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'image' => '1',
                'status' => 1,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'image' => '1',
                'status' => 1,
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'image' => '1',
                'status' => 1,
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'image' => '1',
                'status' => 1,
            ],
            [
                'name' => 'Oppo',
                'slug' => 'oppo',
                'image' => '1',
                'status' => 1,
            ],
        ];

        $languages = Language::all();
        foreach ($list as $item) {
            $brand = ProductBrand::create([
                'slug' => $item['slug'],
                'image' => $item['image'],
                'status' => '1',
            ]);

            foreach ($languages as $language) {
                $brand->translations()->create([
                    'lang_code' => $language->code,
                    'name' => $item['name'],
                ]);
            }
        }
    }
}
