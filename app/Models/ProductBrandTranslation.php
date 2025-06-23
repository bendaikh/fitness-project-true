<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrandTranslation extends Model
{
    use HasFactory;

    protected $table = 'product_brand_translations';

    protected $fillable = [
        'name', 'description', 'product_brand_id', 'lang_code',
    ];

    public function productBrand()
    {
        return $this->belongsTo(ProductBrand::class);
    }
}
