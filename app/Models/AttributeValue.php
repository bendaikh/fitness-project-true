<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attribute_values';

    protected $fillable = ['name', 'has_thumbnail', 'thumbnail', 'attribute_id', 'order'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
