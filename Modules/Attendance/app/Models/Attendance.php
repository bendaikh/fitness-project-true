<?php

namespace Modules\Attendance\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attendance\Database\factories\AttendanceFactory;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'member_id',
        'in_time',
        'out_time',
        'date',
        'status',
    ];
}
