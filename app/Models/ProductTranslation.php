<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $table = 'product_translations';

    protected $fillable = [
        'name', 'short_description', 'description', 'additional_information', 'tags', 'product_id', 'lang_code',
        'meta_title', 'meta_keywords', 'meta_description',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
