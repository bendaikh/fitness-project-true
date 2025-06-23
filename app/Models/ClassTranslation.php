<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['lang_code', 'name', 'description'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
