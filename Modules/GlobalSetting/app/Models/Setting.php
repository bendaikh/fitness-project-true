<?php

namespace Modules\GlobalSetting\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value'];


    public static function boot()
    {
        parent::boot();

        // forget cache on update or delete or create
        static::updated(function () {
            Cache::clear();
        });

        static::deleted(function () {
            Cache::clear();
        });

        static::created(function () {
            Cache::clear();
        });
    }
}
