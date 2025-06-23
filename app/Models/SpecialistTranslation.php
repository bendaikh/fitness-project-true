<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistTranslation extends Model
{
    use HasFactory;

    protected $table = 'specialist_translations';

    protected $fillable = [
        'name', 'description', 'specialist_id', 'lang_code',
    ];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

}
