<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    use HasFactory;

    protected $table = 'service_translations';
    protected $fillable = [
        'lang_code',
        'title',
        'description',
        'short_description',
        'meta_title',
        'meta_description',
    ];
}
