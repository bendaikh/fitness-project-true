<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GymService extends Model
{
    use HasFactory;

    protected $table = 'gym_services';

    protected $fillable = ['slug', 'image', 'status'];

    public function translations(): ?HasMany
    {
        return $this->hasMany(GymServiceTranslation::class, 'gym_service_id');
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(GymServiceTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?GymServiceTranslation
    {
        return $this->hasOne(GymServiceTranslation::class)->where('lang_code', $code)->first();
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
}
