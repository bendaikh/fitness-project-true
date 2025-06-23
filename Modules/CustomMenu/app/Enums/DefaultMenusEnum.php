<?php

namespace Modules\CustomMenu\app\Enums;

use Illuminate\Support\Collection;
use Modules\PageBuilder\app\Models\CustomPage;

enum DefaultMenusEnum: string
{
    public static function getAll(): Collection
    {

        $all_default_menus = [
            (object) ['name' => __('Home'), 'url' => '/'],
            (object) ['name' => __('About Us'), 'url' => '/about-us'],
            (object) ['name' => __('Pricing'), 'url' => '/membership'],
            (object) ['name' => __('Contact Us'), 'url' => '/contact'],
            (object) ['name' => __('Product'), 'url' => '/shop'],
            (object) ['name' => __('Services'), 'url' => '/service'],
            (object) ['name' => __('Trainers'), 'url' => '/trainer'],
            (object) ['name' => __('Workouts'), 'url' => '/workout'],
            (object) ['name' => __('Photo Gallery'), 'url' => '/image-gallery'],
            (object) ['name' => __('Video Gallery'), 'url' => '/video-gallery'],
            (object) ['name' => __('Awards'), 'url' => '/award'],
            (object) ['name' => __('FAQ'), 'url' => '/faqs'],
            (object) ['name' => __('Blog'), 'url' => '/blogs'],
        ];

        $pages = CustomPage::where('status', 1)->get();

        $code = request('code') ?? getSessionLanguage();

        foreach ($pages as $page) {
            $item = (object) ['name' => $page->getTranslation($code)->name, 'url' => "/pages/$page->slug"];
            array_push($all_default_menus, $item);
        }


        // Sort the array by the 'name' property
        usort($all_default_menus, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

        // Convert the sorted array to a collection
        return collect($all_default_menus);
    }
}
