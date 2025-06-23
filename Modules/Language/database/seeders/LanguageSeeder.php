<?php

namespace Modules\Language\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Language\app\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = new Language();
        $language->name = 'English';
        $language->code = 'en';
        $language->is_default = true;
        $language->save();
    }
}
