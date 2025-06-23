<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContactPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'email',
        'phone',
        'image',
        'map',
    ];

    public static function boot()
    {
        parent::boot();
        static::saved(function () {
            Cache::forget('contact_page');
        });
        static::created(function () {
            Cache::forget('contact_page');
        });
        static::updated(function () {
            Cache::forget('contact_page');
        });
        static::deleted(function () {
            Cache::forget('contact_page');
        });
    }
    public function translation()
    {
        return $this->hasOne(ContactPageTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code)
    {
        return $this->hasOne(ContactPageTranslation::class)->where('lang_code', $code)->first();
    }
    public function translations()
    {
        return $this->hasMany(ContactPageTranslation::class, 'contact_page_id');
    }

    public function getTitleAttribute()
    {
        return $this->translation?->title;
    }
}
