<?php

namespace Modules\CustomMenu\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class MenuItemTranslation extends Model
{
    protected $table = null;

    public function __construct(array $attributes = [])
    {
        $this->table = 'menu_item_translations';
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_item_id', 'label', 'lang_code'];

    public function menuItems(): ?BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id');
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
