<?php

namespace Modules\CustomMenu\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class MenuTranslation extends Model
{
    protected $table = null;

    public function __construct(array $attributes = [])
    {
        $this->table = 'menu_translations';
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['menu_id', 'name', 'lang_code'];

    public function menus(): ?BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
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
