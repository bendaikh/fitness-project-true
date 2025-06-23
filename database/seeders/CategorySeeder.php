<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Modules\Language\app\Models\Language;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = Language::all();

        // category about gym products
        $lists = [
            [
                'name' => 'Clothing',
                'description' => 'Clothing',
                'slug' => 'clothing',
                'image' => '1',
            ],
            [
                'name' => 'Shoes',
                'description' => 'Shoes',
                'slug' => 'shoes',
                'image' => '1',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Accessories',
                'slug' => 'accessories',
                'image' => '1',
            ],
            [
                'name' => 'Equipment',
                'description' => 'Equipment',
                'slug' => 'equipment',
                'image' => '1',
            ],
        ];

        foreach ($lists as $item) {
            $brand = Category::create([
                'slug' => $item['slug'],
                'image' => $item['image'],
                'status' => '1',
            ]);

            foreach ($languages as $language) {
                $brand->translations()->create([
                    'lang_code' => $language->code,
                    'name' => $item['name'],
                    'description' => $item['description'],
                ]);
            }
        }

    }
}
