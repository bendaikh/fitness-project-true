<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounterTranslation extends Model
{
    use HasFactory;

    protected $table = 'counter_translations';
    protected $fillable = [
        'title',
        'lang_code',
        'counter_id',
    ];

}
