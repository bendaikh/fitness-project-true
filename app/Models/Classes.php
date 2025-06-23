<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'workout_id',
        'date',
        'start_at',
        'end_at',
        'day',
        'room',
        'status',
    ];

    public function translations(): ?HasMany
    {
        return $this->hasMany(ClassTranslation::class, 'class_id');
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(ClassTranslation::class, 'class_id')->where('lang_code', getSessionLanguage());
    }
    public function getTranslation($code): ?ClassTranslation
    {
        return $this->hasOne(ClassTranslation::class, 'class_id')->where('lang_code', $code)->first();
    }


    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'class_activities', 'class_id', 'activity_id');
    }


    // has many trainers
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'class_trainers', 'class_id', 'trainer_id');
    }

    // workout
    public function workout()
    {
        return $this->belongsTo(Workout::class);
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
