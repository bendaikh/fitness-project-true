<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutEnrollment extends Model
{
    use HasFactory;

    protected $table = 'workout_enrollments';

    protected $fillable = [
        'workout_id',
        'user_id',
        'enroll_date',
        'start_date',
        'invoice_id',
        'expire_date',
        'status',
        'created_by',
        'updated_by',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'workout_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'enrollment_id');
    }
}
