<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSliderTranslation extends Model
{
    use HasFactory;

    protected $table = 'home_page_slider_translations';

    protected $fillable = [
        'title',
        'subtitle_1',
        'subtitle_2',
        'button_text',
        'lang_code',
        'home_page_slider_id'
    ];
}
