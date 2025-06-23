<?php

namespace App\Models;

use App\Traits\UpdateGenericClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{

    use HasFactory, UpdateGenericClass;
    protected $table = 'tools';
    protected $fillable = [
        'status', 'created_by', 'updated_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function translations()
    {
        return $this->hasMany(ToolTranslation::class, 'tool_id');
    }

    public function translation()
    {
        return $this->hasOne(ToolTranslation::class, 'tool_id')->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code)
    {
        return $this->hasOne(ToolTranslation::class)->where('lang_code', $code)->first();
    }
}
