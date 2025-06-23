<?php

namespace Database\Seeders;

use App\Models\Locker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LockerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $index) {
            Locker::create([
                'locker_no' => 'L00' . $index,
                'availability' => 'available',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
