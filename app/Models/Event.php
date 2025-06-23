<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'location',
        'slug',
        'start',
        'end',
        'banner',
        'images',
        'videos',
        'organized_by',
        'status',
        'contributors',
    ];
    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'contributors' => 'array',
    ];

    public function translations(): ?HasMany
    {
        return $this->hasMany(EventTranslation::class, 'event_id');
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(EventTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?EventTranslation
    {
        return $this->hasOne(EventTranslation::class)->where('lang_code', $code)->first();
    }

    public function getTranslations()
    {
        return $this->translations()->get();
    }

    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }

    public function getShortDescriptionAttribute(): ?string
    {
        return $this->translation?->short_description;
    }
    public function getDescriptionAttribute(): ?string
    {
        return $this->translation?->description;
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value);
    }

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function getVideosAttribute($value)
    {
        return json_decode($value);
    }

    public function setVideosAttribute($value)
    {
        $this->attributes['videos'] = json_encode($value);
    }

    public function getContributorsAttribute($value)
    {
        return json_decode($value);
    }

    public function setContributorsAttribute($value)
    {
        $this->attributes['contributors'] = json_encode($value);
    }

    public function getStartTimeAttribute($value)
    {
        return date('Y-m-d\TH:i', strtotime($value));
    }

    public function getEndTimeAttribute($value)
    {
        return date('Y-m-d\TH:i', strtotime($value));
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end'] = date('Y-m-d H:i:s', strtotime($value));
    }
}
