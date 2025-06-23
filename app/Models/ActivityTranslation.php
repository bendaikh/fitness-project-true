<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTranslation extends Model
{
    use HasFactory;

    protected $table = "activity_translations";
    protected $fillable = ['activity_id','name', 'lang_code'];


    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
