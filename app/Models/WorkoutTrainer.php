<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutTrainer extends Model
{
    use HasFactory;

    protected $table = 'workout_trainers';

    protected $fillable = [
        'workout_id',
        'trainer_id',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'workout_id', 'id');
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }
}
