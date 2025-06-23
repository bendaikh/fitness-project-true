<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';
    protected $fillable = [
        'about_us_image',
        'about_us_status',
        'choose_us_image_1',
        'choose_us_image_2',
        'choose_us_status',
        'support_us_image',
        'support_us_video',
        'about_us_button_link',
        'choose_us_button_link',
        'support_us_status',
        'support_us_button_link',
        'exercise_image',
        'exercise_us_status',
        'team_status',
        'team_image',
        'testimonial_status',
        'testimonial_image',
    ];

    public function translation()
    {
        return $this->hasOne(AboutTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code)
    {
        return $this->hasOne(AboutTranslation::class)->where('lang_code', $code)->first();
    }
    public function translations()
    {
        return $this->hasMany(AboutTranslation::class, 'about_id');
    }
    public function getTitleAttribute()
    {
        return $this->translation?->title;
    }
}
