<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFaqTranslation extends Model
{
    use HasFactory;

    protected $table = 'service_faq_translations';
    protected $fillable = [
        'service_faq_id',
        'lang_code',
        'question',
        'answer',
    ];
}
