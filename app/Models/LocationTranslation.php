<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTranslation extends Model
{
    use HasFactory;

    protected $table = 'location_translations';

    protected $fillable = ['name', 'lang_code', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
