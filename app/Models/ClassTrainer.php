<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTrainer extends Model
{
    use HasFactory;

    protected $table = 'class_trainers';

    protected $fillable = [
        'class_id',
        'trainer_id',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
