<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HomePageSlider extends Model
{
    use HasFactory;

    protected $table = 'home_page_sliders';
    protected $fillable = [
        'image',
        'status',
        'button_text',
        'button_icon',
        'button_link',
        'home_page',
        'order'
    ];

    public function translations(): ?HasMany
    {
        return $this->hasMany(HomePageSliderTranslation::class, 'home_page_slider_id');
    }

    public function translation(): ?HasOne
    {
        return $this->hasOne(HomePageSliderTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?HomePageSliderTranslation
    {
        return $this->hasOne(HomePageSliderTranslation::class)->where('lang_code', $code)->first();
    }

    public function getTitleAttribute(): ?string
    {
        return $this->translation?->title;
    }

    public function getSubtitle1Attribute(): ?string
    {
        return $this->translation?->subtitle_1;
    }

    public function getSubtitle2Attribute(): ?string
    {
        return $this->translation?->subtitle_2;
    }

    public function getButtonTextAttribute(): ?string
    {
        return $this->translation?->button_text;
    }
}
