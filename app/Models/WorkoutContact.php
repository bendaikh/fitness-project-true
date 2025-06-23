<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutContact extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'email', 'phone', 'message', 'workout_id', 'status', 'service_id'];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
