<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = ['status'];
    public function translations()
    {
        return $this->hasMany(ActivityTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ActivityTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code)
    {
        return $this->hasOne(ActivityTranslation::class)->where('lang_code', $code)->first();
    }

    public function getNameAttribute()
    {
        return $this->translation?->name;
    }
}
