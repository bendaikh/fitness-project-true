<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table = 'video_galleries';
    protected $fillable = ['group_id', 'videos', 'status'];

    protected $casts = [
        'videos' => 'array',
    ];
    public function group()
    {
        return $this->belongsTo(GalleryGroup::class, 'group_id');
    }


}
