<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use HasFactory;

    protected $table = 'event_translations';

    protected $fillable = [
        'name', 'short_description', 'description', 'lang_code', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
