<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolTranslation extends Model
{
    use HasFactory;

    protected $table = 'tool_translations';

    protected $fillable = [
        'name', 'tool_id', 'lang_code',
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
