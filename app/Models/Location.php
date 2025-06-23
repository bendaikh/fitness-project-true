<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory, UpdateGenericClass;
    protected $table = 'locations';
    protected $fillable = [
        'status',
        'created_by',
        'updated_by',
    ];
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function workout(): HasMany
    {
        return $this->hasMany(Workout::class, 'location_id');
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(LocationTranslation::class, 'location_id');
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(LocationTranslation::class)->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?LocationTranslation
    {
        return $this->hasOne(LocationTranslation::class)->where('lang_code', $code)->first();
    }

    public function getTranslations()
    {
        return $this->translations()->get();
    }

    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }
}
