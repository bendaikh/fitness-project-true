<?php

namespace App\Enums;

enum DefaultImages: string
{
    case COUNTER_IMAGE_1 = 'website/images/counter_icon_1.png';
    case COUNTER_IMAGE_2 = 'website/images/counter_icon_2.png';
    case COUNTER_IMAGE_3 = 'website/images/counter_icon_3.png';
    case COUNTER_IMAGE_4 = 'website/images/counter_icon_4.png';

    public static function getAllCounterImages(): array
    {
        return [self::COUNTER_IMAGE_1->value, self::COUNTER_IMAGE_2->value, self::COUNTER_IMAGE_3->value, self::COUNTER_IMAGE_4->value];
    }

    case BANNER_SECTION_IMAGE = 'website/images/banner_bg.jpg';
    case BANNER_SECTION_ICON = 'website/images/banner_icon.png';
    case RATING_SECTION_IMAGE = 'website/images/banner_client_img.png';
    case FEATURE_SECTION_ELEMENT_1_ICON = 'website/images/feature_icon_1.png';
    case FEATURE_SECTION_ELEMENT_2_ICON = 'website/images/feature_icon_2.png';
    case FEATURE_SECTION_ELEMENT_3_ICON = 'website/images/feature_icon_3.png';
    case FEATURE_SECTION_ELEMENT_4_ICON = 'website/images/feature_icon_4.png';
    case WORKING_PROCESS_SECTION_IMAGE = 'website/images/work_bg.jpg';
    case COUNTER_SECTION_IMAGE = 'website/images/counter_img.png';

    public static function getAllHomepageImages(): array
    {
        return [self::BANNER_SECTION_IMAGE->value, self::BANNER_SECTION_ICON->value, self::RATING_SECTION_IMAGE->value, self::FEATURE_SECTION_ELEMENT_1_ICON->value, self::FEATURE_SECTION_ELEMENT_2_ICON->value, self::FEATURE_SECTION_ELEMENT_3_ICON->value, self::FEATURE_SECTION_ELEMENT_4_ICON->value, self::WORKING_PROCESS_SECTION_IMAGE->value, self::COUNTER_SECTION_IMAGE->value];
    }

    case CATEGORY_ICON_1 = 'website/images/category_icon_1.svg';
    case CATEGORY_ICON_2 = 'website/images/category_icon_2.svg';
    case CATEGORY_ICON_3 = 'website/images/category_icon_3.svg';
    case CATEGORY_ICON_4 = 'website/images/category_icon_4.svg';
    case CATEGORY_ICON_5 = 'website/images/category_icon_5.svg';
    case CATEGORY_ICON_6 = 'website/images/category_icon_6.svg';
    case CATEGORY_ICON_7 = 'website/images/category_icon_7.svg';

    public static function getAllListingCategoryImages(): array
    {
        return [self::CATEGORY_ICON_1->value, self::CATEGORY_ICON_2->value, self::CATEGORY_ICON_3->value, self::CATEGORY_ICON_4->value, self::CATEGORY_ICON_5->value, self::CATEGORY_ICON_6->value, self::CATEGORY_ICON_7->value];
    }

    case FAMOUS_CITY_1 = 'website/images/famous_cities_1.jpg';
    case FAMOUS_CITY_2 = 'website/images/famous_cities_2.jpg';
    case FAMOUS_CITY_3 = 'website/images/famous_cities_3.jpg';
    case FAMOUS_CITY_4 = 'website/images/famous_cities_4.jpg';
    case FAMOUS_CITY_5 = 'website/images/famous_cities_5.jpg';
    case FAMOUS_CITY_6 = 'website/images/famous_cities_6.jpg';

    public static function getAllFamousCitiesImages(): array
    {
        return [self::FAMOUS_CITY_1->value, self::FAMOUS_CITY_2->value, self::FAMOUS_CITY_3->value, self::FAMOUS_CITY_4->value, self::FAMOUS_CITY_5->value, self::FAMOUS_CITY_6->value];
    }

    case ABOUT_IMAGE_1 = 'website/images/about_img_1.png';
    case ABOUT_IMAGE_2 = 'website/images/about_img_2.png';

    public static function getAllaboutUsImages(): array
    {
        return [self::ABOUT_IMAGE_1->value, self::ABOUT_IMAGE_2->value];
    }

    case USER_IMAGE = 'uploads/website-images/avatar-2023-11-05-08-21-19-9394.jpg';

    public static function getAllAuthImages(): array
    {
        return ['website/images/login_img_1.jpg', 'website/images/login_img_2.jpg', 'website/images/forgot_password_img.jpg'];
    }
}
