<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;

class Counter extends Model
{
    use HasFactory;
    protected $fillable = [
        'home',
        'icon',
        'number',
        'status',
    ];


    public static function boot()
    {
        parent::boot();

        if (str_contains(Route::currentRouteName(), 'website.')) {
            static::addGlobalScope('status', function (Builder $builder) {
                $builder->where('status', 1);
            });
        }
    }


    public function translation(): ?HasOne
    {
        return $this->hasOne(CounterTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?CounterTranslation
    {
        return $this->hasOne(CounterTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(CounterTranslation::class, 'counter_id');
    }

    public function getTitleAttribute(): ?string
    {
        return $this->translation?->title;
    }
}
