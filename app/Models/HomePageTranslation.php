<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_page_id',
        'lang_code',
        'about_us_title',
        'about_us_inner_title',
        'about_us_sub_title',
        'about_us_description_list',
        'about_us_button_text',
        'team_title',
        'team_button_text',
        'video_section_title',
        'about_us_description',
        'pricing_title',
        'pricing_description',
    ];

    protected $casts = [
        'about_us_description_list' => 'array',
    ];

    public function homePage()
    {
        return $this->belongsTo(HomePage::class);
    }
}
