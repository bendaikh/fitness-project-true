<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkoutCategory extends Model
{
    use HasFactory, UpdateGenericClass;
    protected $table = 'workout_categories';
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

    public function workouts(): HasMany
    {
        return $this->hasMany(Workout::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(WorkoutCategoryTranslation::class, 'workout_category_id');
    }

    public function translation()
    {
        return $this->hasOne(WorkoutCategoryTranslation::class, 'workout_category_id')->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code)
    {
        return $this->hasOne(WorkoutCategoryTranslation::class)->where('lang_code', $code)->first();
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
