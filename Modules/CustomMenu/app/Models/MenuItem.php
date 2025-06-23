<?php

namespace Modules\CustomMenu\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class MenuItem extends Model
{
    protected $table = null;

    protected $fillable = ['label', 'link', 'parent_id', 'sort', 'menu_id'];

    public function __construct(array $attributes = [])
    {
        $this->table = 'menu_items';
    }

    public function getSons($id)
    {
        return $this->where("parent_id", $id)->get();
    }
    public function getAll($id)
    {
        return $this->select('id', 'menu_id', 'link', 'label', 'parent_id', 'sort')->with(['translation' => function ($query) {
            $query->select('id', 'menu_item_id', 'label');
        }])->where("menu_id", $id)->orderBy("sort", "asc")->get();
    }
    public function getAllParents($id)
    {
        return $this->with('child')->select('id', 'menu_id', 'link', 'label', 'parent_id', 'sort')->with(['translation' => function ($query) {
            $query->select('id', 'menu_item_id', 'label');
        }])->where("menu_id", $id)->where('parent_id', 0)->orderBy("sort", "asc")->get();
    }

    public static function getNextSortRoot($menu)
    {
        return self::where('menu_id', $menu)->max('sort') + 1;
    }

    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function child()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('sort', 'ASC');
    }

    public function getLabelAttribute(): ?string
    {
        return $this->translation?->label;
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(MenuItemTranslation::class, 'menu_item_id')->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?MenuItemTranslation
    {
        return $this->hasOne(MenuItemTranslation::class, 'menu_item_id')->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(MenuItemTranslation::class, 'menu_item_id');
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
