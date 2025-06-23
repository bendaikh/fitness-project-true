<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SectionControl extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'key'];


    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            static::forgetCache();
        });

        static::updated(function () {
            static::forgetCache();
        });
    }

    protected static function forgetCache()
    {
        Cache::forget('section_visibility');
    }
}
