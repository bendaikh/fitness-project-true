<?php

namespace Modules\Media\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'path', 'alt_text', 'description', 'height', 'width', 'mime_type', 'size'];
}
