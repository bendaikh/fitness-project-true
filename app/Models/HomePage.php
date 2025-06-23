<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'home',
        'about_us_image',
        'about_us_images',
        'about_us_bg_shape_1',
        'about_us_bg_shape_2',
        'about_us_button_link',
        'team_bg_image',
        'team_button_link',
        'video_bg_image',
        'video_button_link',
        'video_button_icon',
        'testimonial_image',
    ];

    protected $table = 'home_pages';
    protected $with = ['translation'];

    protected $casts = [
        'about_us_images' => 'array',
    ];

    public function translation(): ?HasOne
    {
        return $this->hasOne(HomePageTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?HomePageTranslation
    {
        return $this->hasOne(HomePageTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(HomePageTranslation::class, 'home_page_id');
    }

    public function getAboutUsSubTitleAttribute()
    {
        return $this->translation?->about_us_sub_title;
    }

    public function getAboutUsInnerTitleAttribute()
    {
        return $this->translation?->about_us_inner_title;
    }

    public function getAboutUsTitleAttribute()
    {
        return $this->translation?->about_us_title;
    }

    public function getAboutUsDescriptionListAttribute()
    {
        return $this->translation?->about_us_description_list;
    }

    public function getAboutUsButtonTextAttribute()
    {
        return $this->translation?->about_us_button_text;
    }
}
