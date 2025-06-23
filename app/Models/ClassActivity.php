<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassActivity extends Model
{
    use HasFactory;

    protected $table = 'class_activities';

    protected $fillable = [
        'class_id',
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
