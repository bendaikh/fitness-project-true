<?php

namespace Modules\GlobalSetting\database\seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\app\Models\CustomPagination;

class CustomPaginationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomPagination::truncate();
        $item1 = new CustomPagination();
        $item1->section_name = 'Blog List';
        $item1->item_qty = 9;
        $item1->save();

        $item2 = new CustomPagination();
        $item2->section_name = 'Blog Comment';
        $item2->item_qty = 10;
        $item2->save();

        $item2 = new CustomPagination();
        $item2->section_name = 'Language List';
        $item2->item_qty = 100;
        $item2->save();

        $item3 = new CustomPagination();
        $item3->section_name = 'Media List';
        $item3->item_qty = 10;
        $item3->save();


        $item4 = new CustomPagination();
        $item4->section_name = 'Product List';
        $item4->item_qty = 9;
        $item4->save();


        $item5 = new CustomPagination();
        $item5->section_name = 'Workout List';
        $item5->item_qty = 9;
        $item5->save();

        $item6 = new CustomPagination();
        $item6->section_name = 'Trainer List';
        $item6->item_qty = 9;
        $item6->save();

        $item6 = new CustomPagination();
        $item6->section_name = 'Service List';
        $item6->item_qty = 9;
        $item6->save();

        $item6 = new CustomPagination();
        $item6->section_name = 'Award List';
        $item6->item_qty = 6;
        $item6->save();
    }
}
