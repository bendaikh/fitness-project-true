<?php

namespace Modules\Language\app\Enums;

enum TranslationModels: string
{
    /**
     * whenever update new case also update getAll() method
     * to return all values in array
     */
    case Blog = "Modules\Blog\app\Models\BlogTranslation";
    case BlogCategory = "Modules\Blog\app\Models\BlogCategoryTranslation";
    case MenuBuilder = "Modules\CustomMenu\app\Models\MenuTranslation";
    case Testimonial = "Modules\Testimonial\app\Models\TestimonialTranslation";
    case Faq = "Modules\Faq\app\Models\FaqTranslation";
    case ProductCategory = "App\Models\ProductCategoryTranslation";
    case ProductBrand = "App\Models\ProductBrandTranslation";
    case Product = "App\Models\ProductTranslation";
    case Workout = "App\Models\WorkoutTranslation";
    case Activity = "App\Models\ActivityTranslation";
    case Specialist = "App\Models\SpecialistTranslation";
    case HomePageSlider = "App\Models\HomePageSliderTranslation";
    case GymService = "App\Models\ServiceTranslation";
    case ServiceFaq = "App\Models\ServiceFaqTranslation";
    case Counter = "App\Models\CounterTranslation";
    case Homepage = "App\Models\HomePageTranslation";
    case ContactPage = "App\Models\ContactPageTranslation";
    case About = "App\Models\AboutTranslation";
    case PagesUtility = "App\Models\PagesUtilityTranslation";
    case SectionContent = "App\Models\SectionContentTranslation";
    case Classes = "App\Models\ClassTranslation";
    case MenuItem = "Modules\CustomMenu\app\Models\MenuItemTranslation";
    case CustomPage = "Modules\PageBuilder\app\Models\CustomPageTranslation";

    public static function getAll(): array
    {
        return [
            self::Blog->value,
            self::BlogCategory->value,
            self::MenuBuilder->value,
            self::Testimonial->value,
            self::Faq->value,
            self::ProductCategory->value,
            self::ProductBrand->value,
            self::Product->value,
            self::Workout->value,
            self::Activity->value,
            self::Specialist->value,
            self::HomePageSlider->value,
            self::GymService->value,
            self::ServiceFaq->value,
            self::Counter->value,
            self::Homepage->value,
            self::ContactPage->value,
            self::About->value,
            self::PagesUtility->value,
            self::SectionContent->value,
            self::Classes->value,
            self::MenuItem->value,
            self::CustomPage->value,
        ];
    }

    public static function igonreColumns(): array
    {
        return [
            'id',
            'lang_code',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}
