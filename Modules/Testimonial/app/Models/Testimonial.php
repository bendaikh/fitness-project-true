<?php

namespace Modules\Testimonial\app\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Route;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'image',
        'rating',
        'status',
    ];

    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }

    public function getDesignationAttribute(): ?string
    {
        return $this->translation?->designation;
    }

    public function getCommentAttribute(): ?string
    {
        return $this->translation?->comment;
    }

    public function translation(): ?HasOne
    {
        return $this->hasOne(TestimonialTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?TestimonialTranslation
    {
        return $this->hasOne(TestimonialTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(TestimonialTranslation::class, 'testimonial_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public static function boot()
    {
        parent::boot();

        if (str_contains(Route::currentRouteName(), 'website.')) {
            static::addGlobalScope('status', function (Builder $builder) {
                $builder->where('status', 1);
            });
        }
    }
}
