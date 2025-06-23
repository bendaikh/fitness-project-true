<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\app\Models\Media;

class ImageGallery extends Model
{
    use HasFactory;

    protected $table = 'image_galleries';

    protected $fillable = ['group_id', 'images', 'status'];

    protected $casts = [
        'images' => 'array',
    ];

    public function galleryGroup()
    {
        return $this->belongsTo(GalleryGroup::class, 'group_id');
    }

    public function getImageArrayAttribute(): ?array
    {
        if ($this->images) {
            $images = $this->images[0];

            if ($images) {
                return explode(',', $images);
            }

            return $images;
        }
        return [];
    }

    public function getImageUrlAttribute(): ?array
    {
        $images =  Media::whereIn('id', $this->imageArray)->get();

        if ($images) {
            $images = $images->pluck('path')->toArray();
        }
        return $images;
    }
}
