<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_code',
        'title',
        'subtitle',
    ];
}
