<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityTranslation extends Model
{
    use HasFactory;

    protected $table = 'facility_translations';

    protected $fillable = ['name', 'description', 'lang_code', 'facility_id'];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
