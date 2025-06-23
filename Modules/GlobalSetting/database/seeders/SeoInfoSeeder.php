<?php

namespace Modules\GlobalSetting\database\seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\app\Models\SeoSetting;

class SeoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeoSetting::truncate();

        $item1 = new SeoSetting();
        $item1->page_name = 'Home Page';
        $item1->seo_title = 'Home || WebSolutionUS';
        $item1->seo_description = 'Home || WebSolutionUS';
        $item1->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'About Page';
        $item2->seo_title = 'About || WebSolutionUS';
        $item2->seo_description = 'About || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Shop Page';
        $item2->seo_title = 'Shop || WebSolutionUS';
        $item2->seo_description = 'Shop || WebSolutionUS';
        $item2->save();

        $item3 = new SeoSetting();
        $item3->page_name = 'Contact Page';
        $item3->seo_title = 'Contact || WebSolutionUS';
        $item3->seo_description = 'Contact || WebSolutionUS';
        $item3->save();

        $item4 = new SeoSetting();
        $item4->page_name = 'Service Page';
        $item4->seo_title = 'Service || WebSolutionUS';
        $item4->seo_description = 'Service || WebSolutionUS';
        $item4->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Blog Page';
        $item2->seo_title = 'Blog Page || WebSolutionUS';
        $item2->seo_description = 'Blog Page || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'FAQ Page';
        $item2->seo_title = 'FAQ Page || WebSolutionUS';
        $item2->seo_description = 'FAQ Page || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Privacy & Policy Page';
        $item2->seo_title = 'Privacy & Policy || WebSolutionUS';
        $item2->seo_description = 'Privacy & Policy || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Terms & Condition Page';
        $item2->seo_title = 'Terms & Condition || WebSolutionUS';
        $item2->seo_description = 'Terms & Condition || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Workout Page';
        $item2->seo_title = 'Workout || WebSolutionUS';
        $item2->seo_description = 'Workout || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Trainer Page';
        $item2->seo_title = 'Trainer || WebSolutionUS';
        $item2->seo_description = 'Trainer || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Image Gallery Page';
        $item2->seo_title = 'Image Gallery || WebSolutionUS';
        $item2->seo_description = 'Image Gallery || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Video Gallery Page';
        $item2->seo_title = 'Video Gallery || WebSolutionUS';
        $item2->seo_description = 'Video Gallery || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Award Page';
        $item2->seo_title = 'Award || WebSolutionUS';
        $item2->seo_description = 'Award || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Pricing Page';
        $item2->seo_title = 'Pricing || WebSolutionUS';
        $item2->seo_description = 'Pricing || WebSolutionUS';
        $item2->save();
        $item2 = new SeoSetting();
        $item2->page_name = 'Cart Page';
        $item2->seo_title = 'Cart || WebSolutionUS';
        $item2->seo_description = 'Cart || WebSolutionUS';
        $item2->save();

        $item2 = new SeoSetting();
        $item2->page_name = 'Checkout Page';
        $item2->seo_title = 'Checkout || WebSolutionUS';
        $item2->seo_description = 'Checkout || WebSolutionUS';
        $item2->save();


        $item2 = new SeoSetting();
        $item2->page_name = 'Payment Page';
        $item2->seo_title = 'Payment || WebSolutionUS';
        $item2->seo_description = 'Payment || WebSolutionUS';
        $item2->save();


        $item2 = new SeoSetting();
        $item2->page_name = 'Wishlist Page';
        $item2->seo_title = 'Wishlist || WebSolutionUS';
        $item2->seo_description = 'Payment || WebSolutionUS';
        $item2->save();
    }
}
