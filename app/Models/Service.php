<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Modules\Media\app\Models\Media;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'slug',
        'file',
        'image',
        'images',
        'videos',
        'status',
        'tags'
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];

    public function translation(): ?HasOne
    {
        return $this->hasOne(ServiceTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?ServiceTranslation
    {
        return $this->hasOne(ServiceTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id');
    }

    public function getNameAttribute(): ?string
    {
        return $this->translation?->title;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation?->description;
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->translation?->short_description;
    }

    public function getMetaTitleAttribute(): ?string
    {
        return $this->translation?->meta_title;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        return $this->translation?->meta_description;
    }

    // faqs

    public function faqs(): ?HasMany
    {
        return $this->hasMany(ServiceFaq::class, 'service_id');
    }

    public function getFaqsAttribute(): ?Collection
    {
        return $this->faqs()->with('translation')->get()->map(function ($faq) {
            return [
                'id' => $faq->id,
                'question' => $faq->question,
                'answer' => $faq->answer,

            ];
        });
    }

    public function getImageArrayAttribute(): ?array
    {
        if ($this->images) {
            $images = $this->images[0];

            if ($images) {
                return explode(',', $images);
            }

            return $images;
        }
        return [];
    }

    public function getImageUrlAttribute(): ?array
    {
        $images =  Media::whereIn('id', $this->imageArray ?? [])->get();

        if ($images) {
            $images = $images->pluck('path')->toArray();
        }
        return $images;
    }
}
