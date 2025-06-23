<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymServiceTranslation extends Model
{
    use HasFactory;

    protected $table = 'gym_service_translations';
    protected $fillable = ['name', 'short_description', 'description', 'lang_code', 'gym_service_id'];
}
