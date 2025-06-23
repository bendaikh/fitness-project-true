<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutTranslation extends Model
{
    use HasFactory;

    protected $table = 'workout_translations';

    protected $fillable = [
        'name', 'short_description', 'description', 'workout_id', 'lang_code',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
