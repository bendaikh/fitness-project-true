<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Utility extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::saved(function () {
            Cache::forget('PagesUtility');
        });
        static::created(function () {
            Cache::forget('PagesUtility');
        });
        static::updated(function () {
            Cache::forget('PagesUtility');
        });
        static::deleted(function () {
            Cache::forget('PagesUtility');
        });

    }
}
