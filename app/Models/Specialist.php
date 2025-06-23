<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Specialist extends Model
{
    use HasFactory;

    protected $table = 'specialists';

    protected $fillable = [
        'slug',
        'image',
        'status',
    ];

    public function translation(): ?HasOne
    {
        return $this->hasOne(SpecialistTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?SpecialistTranslation
    {
        return $this->hasOne(SpecialistTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(SpecialistTranslation::class, 'specialist_id');
    }

    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation?->description;
    }

    public function trainers()
    {
        return $this->hasMany(Trainer::class, 'specialty_id', 'id');
    }
}
