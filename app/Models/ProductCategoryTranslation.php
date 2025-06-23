<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'product_category_translations';

    protected $fillable = [
        'name', 'description', 'product_category_id', 'lang_code',
    ];

    public function productCategory()
    {
        return $this->belongsTo(Category::class, 'product_category_id', 'id');
    }

}
