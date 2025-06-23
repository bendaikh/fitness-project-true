<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'workout_category_translations';

    protected $fillable = [
        'name', 'description', 'workout_category_id', 'lang_code',
    ];

    public function workoutCategory()
    {
        return $this->belongsTo(WorkoutCategory::class);
    }
}
