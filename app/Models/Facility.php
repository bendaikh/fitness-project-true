<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Facility extends Model
{
    use HasFactory;

    protected $table = 'facilities';

    protected $fillable = ['slug', 'image', 'status'];

    public function translations(): ?HasMany
    {
        return $this->hasMany(FacilityTranslation::class, 'facility_id');
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(FacilityTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?FacilityTranslation
    {
        return $this->hasOne(FacilityTranslation::class)->where('lang_code', $code)->first();
    }

    public function getTranslations()
    {
        return $this->translations()->get();
    }

    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation?->description;
    }
}
