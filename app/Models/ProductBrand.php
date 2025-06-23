<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Media\app\Models\Media;

class ProductBrand extends Model
{
    use HasFactory;

    protected $table = 'product_brands';

    protected $fillable = [
        'slug',
        'image',
        'status',
    ];

    protected $appends = [
        'image_url',
        'name',
        'description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function getNameAttribute()
    {
        return $this->translation?->name;
    }

    public function getDescriptionAttribute()
    {
        return $this->translation?->description;
    }
    public function translation(): ?HasOne
    {
        return $this->hasOne(ProductBrandTranslation::class)->where('lang_code', getSessionLanguage());
    }

    public function getTranslation($code): ?ProductBrandTranslation
    {
        return $this->hasOne(ProductBrandTranslation::class)->where('lang_code', $code)->first();
    }

    public function translations(): ?HasMany
    {
        return $this->hasMany(ProductBrandTranslation::class, 'product_brand_id');
    }

    public function getImageUrlAttribute()
    {
        $img = $this->image;
        if ($img == null) {
            return asset('assets/images/no-image.png');
        }

        return asset($img);
    }
}
