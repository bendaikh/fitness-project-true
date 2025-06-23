<?php

namespace Modules\Installer\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Installer\app\Models\Configuration;

class InstallerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::create(['config' => 'setup_complete', 'value' => 0]);
        Configuration::create(['config' => 'setup_stage', 'value' => 1]);
    }
}
