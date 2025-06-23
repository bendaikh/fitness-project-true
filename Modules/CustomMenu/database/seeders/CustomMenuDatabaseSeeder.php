<?php

namespace Modules\CustomMenu\database\seeders;

use Illuminate\Database\Seeder;
use Modules\CustomMenu\app\Models\Menu;
use Modules\CustomMenu\app\Models\MenuItem;
use Modules\CustomMenu\app\Models\MenuTranslation;
use Modules\CustomMenu\app\Models\MenuItemTranslation;

class CustomMenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function processMenuItems($menuItems, $menuId, $parentId = 0)
        {
            foreach ($menuItems as $item) {
                $menuItem = new MenuItem();
                $menuItem->label = $item['translations'][0]['label'];
                $menuItem->link = $item['link'];
                $menuItem->menu_id = $menuId;
                $menuItem->parent_id = $parentId;
                $menuItem->sort = $item['sort'];

                if ($menuItem->save()) {
                    foreach ($item['translations'] as $translate_item) {
                        MenuItemTranslation::create([
                            'menu_item_id' => $menuItem->id,
                            'lang_code'    => $translate_item['lang_code'],
                            'label'        => $translate_item['label'],
                        ]);
                    }

                    if (isset($item['menu_items']) && is_array($item['menu_items'])) {
                        processMenuItems($item['menu_items'], $menuId, $menuItem->id);
                    }
                }
            }
        }
        // Menu list
        $menu_list = [
            [
                'slug'         => 'main-menu',
                'translations' => [
                    ['lang_code' => 'en', 'name' => 'Main Menu'],
                ],
                'menu_items'   => [

                    [
                        'link'         => '/',
                        'sort'         => 1,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Home'],
                        ],
                    ],
                    [
                        'link'         => '/about-us',
                        'sort'         => 2,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'About Us'],
                        ],
                    ],
                    [
                        'link'         => '/membership',
                        'sort'         => 3,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Pricing'],
                        ],
                    ],
                    [
                        'link'         => '#',
                        'sort'         => 4,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Pages'],
                        ],
                        'menu_items'   => [
                            [
                                'link'         => '/contact',
                                'sort'         => 5,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Contact Us'],
                                ],
                            ],
                            [
                                'link'         => '/shop',
                                'sort'         => 6,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Product'],
                                ],
                            ],
                            [
                                'link'         => '/service',
                                'sort'         => 7,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Services'],
                                ],
                            ],
                            [
                                'link'         => '/trainer',
                                'sort'         => 8,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Trainers'],
                                ],
                            ],
                            [
                                'link'         => '/workout',
                                'sort'         => 9,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Workouts'],
                                ],
                            ],
                            [
                                'link'         => '/image-gallery',
                                'sort'         => 10,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Photo Gallery'],
                                ],
                            ],
                            [
                                'link'         => '/video-gallery',
                                'sort'         => 11,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Video Gallery'],
                                ],
                            ],
                            [
                                'link'         => '/award',
                                'sort'         => 12,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Awards'],
                                ],
                            ],
                            [
                                'link'         => '/faqs',
                                'sort'         => 13,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'FAQ'],
                                ],
                            ],
                            [
                                'link'         => '/privacy-policy',
                                'sort'         => 14,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Privacy Policy'],
                                ],
                            ],
                            [
                                'link'         => '/terms-conditions',
                                'sort'         => 15,
                                'translations' => [
                                    ['lang_code' => 'en', 'label' => 'Terms & Conditions'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'link'         => '/blogs',
                        'sort'         => 16,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Blog'],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'footer-1-menu',
                'translations' => [
                    ['lang_code' => 'en', 'name' => 'Useful Link'],
                ],
                'menu_items'   => [
                    [
                        'link'         => '/about-us',
                        'sort'         => 0,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'About Us'],
                        ],
                    ],
                    [
                        'link'         => '/terms-conditions',
                        'sort'         => 1,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Terms & Conditions'],
                        ],
                    ],
                    [
                        'link'         => '/privacy-policy',
                        'sort'         => 2,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Privacy Policy'],
                        ],
                    ],
                    [
                        'link'         => '/service',
                        'sort'         => 3,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Services'],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'footer-2-menu',
                'translations' => [
                    ['lang_code' => 'en', 'name' => 'Support Desk'],
                ],
                'menu_items'   => [
                    [
                        'link'         => '/membership',
                        'sort'         => 0,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Pricing'],
                        ],
                    ],
                    [
                        'link'         => '/workout',
                        'sort'         => 1,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Workout'],
                        ],
                    ],
                    [
                        'link'         => '/blogs',
                        'sort'         => 2,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Blog'],
                        ],
                    ],
                    [
                        'link'         => '/contact',
                        'sort'         => 3,
                        'translations' => [
                            ['lang_code' => 'en', 'label' => 'Contact Us'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($menu_list as $menu) {
            $data = new Menu();
            $data->name = $menu['translations'][0]['name'];
            $data->slug = $menu['slug'];

            if ($data->save()) {
                foreach ($menu['translations'] as $translate) {
                    MenuTranslation::create([
                        'menu_id'   => $data->id,
                        'lang_code' => $translate['lang_code'],
                        'name'      => $translate['name'],
                    ]);
                }

                if (isset($menu['menu_items']) && is_array($menu['menu_items'])) {
                    processMenuItems($menu['menu_items'], $data->id, 0);
                }
            }
        }
    }
}
