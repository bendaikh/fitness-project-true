<?php

namespace Modules\CustomMenu\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['name', 'slug'];

    public function __construct(array $attributes = [])
    {
        $this->table = 'menus';
    }

    public static function bySlug($slug)
    {
        return self::select('id', 'slug')->with(['translation' => function ($query) {
            $query->select('menu_id', 'name');
        }])->where('slug', $slug)->first();
    }

    public static function byName($name)
    {
        return self::where('name', '=', $name)->first();
    }

    public function getNameAttribute()
    {
        return $this->translation?->name;
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id')->with('child')->where('parent_id', 0)->orderBy('sort', 'ASC');
    }

    public function getLabelAttribute(): ?string
    {
        return $this->translation?->name;
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(MenuTranslation::class, 'menu_id')->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?MenuTranslation
    {
        return $this->hasOne(MenuTranslation::class, 'menu_id')->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(MenuTranslation::class, 'menu_id');
    }

    public static function boot()
    {
        parent::boot();

        // forget cache on update or delete or create
        static::updated(function () {
            Cache::forget('nav_menu');
            Cache::forget('footer_menu');
        });

        static::deleted(function () {
            Cache::forget('nav_menu');
            Cache::forget('footer_menu');
        });

        static::created(function () {
            Cache::forget('nav_menu');
            Cache::forget('footer_menu');
        });
    }
}
