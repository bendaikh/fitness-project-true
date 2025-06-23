<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryGroup extends Model
{
    use HasFactory;

    protected $table = 'gallery_groups';
    protected $fillable = ['name', 'type', 'status'];


    public function images()
    {
        return $this->hasMany(ImageGallery::class, 'group_id');
    }

    public function videos()
    {
        return $this->hasMany(VideoGallery::class, 'group_id');
    }
}
