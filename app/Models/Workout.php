<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\app\Models\Media;

class Workout extends Model
{
    use HasFactory, UpdateGenericClass, SoftDeletes;
    protected $table = 'workouts';
    protected $fillable = [
        'category_id',
        'tool_id',
        'image',
        'images',
        'videos',
        'training_days',
        'price',
        'capacity',
        'enroll_start',
        'enroll_end',
        'created_by',
        'updated_by',
        'status',
        'slug',
        "class_count",
        "class_start_date"
    ];

    protected $casts = [
        'tool_id' => 'array',
        'images' => 'array',
        'videos' => 'array',
    ];

    protected $appends = ['name', 'short_description', 'description'];

    public function category()
    {
        return $this->belongsTo(WorkoutCategory::class, 'category_id');
    }
    public function CreatedBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function UpdatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
    public function getToolsAttributes()
    {
        $tools = Tool::whereIn('id', $this->tool_id)->get();
        return $tools;
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_workouts', 'workout_id', 'member_id')->withPivot('status', 'created_by', 'updated_by');
    }

    public function translations()
    {
        return $this->hasMany(WorkoutTranslation::class, 'workout_id');
    }

    public function translation()
    {
        return $this->hasOne(WorkoutTranslation::class, 'workout_id')->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code)
    {
        return $this->hasOne(WorkoutTranslation::class)->where('lang_code', $code)->first();
    }

    public function getNameAttribute()
    {
        return $this->translation?->name;
    }

    public function getShortDescriptionAttribute()
    {
        return $this->translation?->short_description;
    }

    public function getDescriptionAttribute()
    {
        return $this->translation?->description;
    }


    public function trainers()
    {

        return $this->belongsToMany(Trainer::class, 'workout_trainers', 'workout_id', 'trainer_id');
    }

    public function enrollments()
    {
        return $this->hasMany(WorkoutEnrollment::class, 'workout_id');
    }

    // available seats
    public function getAvailableSeatsAttribute()
    {
        // total enrolled members
        $totalEnrolled = $this->enrollments()->whereDate('created_at', '>=', $this->enroll_start)->count();
        return $this->capacity - $totalEnrolled;
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
