<?php

namespace Modules\Blog\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'comment',
        'name',
        'blog_id',
        'parent_id',
        'email',
        'status',
    ];

    public function post(): ?BelongsTo
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function parent(): ?BelongsTo
    {
        return $this->belongsTo(BlogComment::class, 'parent_id')->where('status', 1);
    }

    public function children()
    {
        return $this->hasMany(BlogComment::class, 'parent_id')->where('status', 1);
    }
}
