<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\app\Models\Media;

class Trainer extends Model
{
    use HasFactory;

    protected $table = 'trainers';

    protected $fillable = ['user_id', 'specialty_id', 'slug', 'short_description', 'description', 'hours_per_week', 'image', 'facebook_link', 'twitter_link', 'instagram_link', 'status', 'user_id', 'facebook_icon', 'twitter_icon', 'instagram_icon', 'skills'];


    protected $casts = [
        'skills' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialist::class, 'specialty_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        $image = $this->user->image;
        if ($image) {
            return asset($image);
        } else {
            $setting = cache('setting');
            return $setting->default_avatar;
        }
    }

    public function workoutClasses()
    {
        // ClassTrainer
        return $this->belongsToMany(Classes::class, 'class_trainers', 'trainer_id', 'class_id');
    }



    // enrolled students

    public function enrolledStudents()
    {
        $workoutIds = $this->workoutClasses()->distinct('workout_id')->pluck('workout_id');

        $enrolledStudents = WorkoutEnrollment::whereIn('workout_id', $workoutIds)
            ->with('user')
            ->distinct('user_id');

        return $enrolledStudents;
    }

    public function workouts()
    {
        return $this->hasManyThrough(Workout::class, WorkoutTrainer::class, 'workout_id', 'id', 'id', 'trainer_id')->groupBy('workout_id');
    }
}
