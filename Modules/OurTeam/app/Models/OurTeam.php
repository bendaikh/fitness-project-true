<?php

namespace Modules\OurTeam\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\OurTeam\Database\factories\OurTeamFactory;

class OurTeam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): OurTeamFactory
    {
        //return OurTeamFactory::new();
    }
}
