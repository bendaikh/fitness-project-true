<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\app\Models\Media;

class Award extends Model
{
    use HasFactory;

    protected $table = 'awards';

    protected $fillable = [
        'name',
        'description',
        'image',
        'date',
        'type',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function getImageUrlAttribute()
    {
        $image = Media::where('id', $this->image)->first();

        return $image ? $image->path : $this->attributes['image'];
    }
}
