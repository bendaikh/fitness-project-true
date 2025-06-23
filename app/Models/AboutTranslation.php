<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_id',
        'lang_code',
        'title',
        'about_us_title',
        'about_us_description',
        'choose_us_title',
        'about_us_button_text',
        'choose_us_button_text',
        'choose_us_description',
        'support_us_title',
        'support_us_description',
        'support_us_button_text',
        'exercise_title',
        'exercise_description',
        'team_title'
    ];
}
