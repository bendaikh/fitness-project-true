<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    use HasFactory;

    protected $table = 'related_products';

    protected $fillable = ['product_id','related_product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id', 'id');
    }
}
