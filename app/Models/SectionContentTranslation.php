<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContentTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_content_id',
        'lang_code',
        'program_title',
        'pricing_title',
        'blog_title',
        'products_title',
        'testimonial_title',
    ];
}
