<?php

namespace App\Services;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantOption;
use Illuminate\Database\Eloquent\Collection;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class ProductService
{
    use GenerateTranslationTrait;
    protected Product $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getProducts()
    {
        $product = $this->product->query();
        if (request('keyword')) {
            $product->where(function ($q) {
                $q->whereHas('translation', function ($query) {
                    $query->where('name', 'like', '%' . request('keyword') . '%');
                });
            });
        }
        if (request()->get('status') != '') {
            $product->where('status', request('status'));
        }
        if (request('order_by')) {
            $product->orderBy('id', request('order_by'));
        }
        return $product;
    }

    public function getActiveProducts()
    {
        $products = $this->product->with('translation')->where('status', 1)->whereHas('categories', function ($query) {
            $query->where('status', 1);
        });

        if (request('search')) {
            $products = $products->whereHas('translation', function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            });
        }

        if (request()->from) {
            $products = $products->where('price', '>=', request()->from);
        }
        if (request()->to) {
            $products = $products->where('price', '<=', request()->to);
        }

        if (request()->category) {
            if (gettype(request()->category) == 'array') {
                $products = $products->whereHas('categories', function ($query) {
                    $query->whereIn('slug', request()->category);
                });
            } else {
                $products = $products->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            }

        }

        if (request()->rating && request()->rating != 'all') {
            $rating = request()->rating;

            $products = $products->whereHas('reviews', function ($query) use ($rating) {
                $query->selectRaw('avg(rating) as average_rating')
                    ->groupBy('product_id')
                    ->havingRaw('average_rating >= ?', [$rating]);
            });
        }
        $products = $products->orderBy('id', 'desc');
        return $products;
    }

    public function getProduct($id): ?Product
    {
        return $this->product->where('id', $id)->first();
    }

    public function updateStatus($product)
    {
        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
        return $product;
    }
    public function storeProduct($request)
    {
        $image = null;
        if ($request->has('image')) {
            $image = file_upload($request->file('image'), null);
        }
        // store product
        $product = $this->product->create([
            'brand_id' => $request->brand_id,
            'slug' => $request->slug,
            'badge' => $request->badge,
            'price' => $request->price,
            'image' => $image,
            'discount' => $request->discount ? $request->discount : 0,
            'discount_type' => $request->discount_type,
            'cost_per_item' => $request->cost_per_item,
            'stock' => $request->quantity,
            'stock_status' => $request->quantity > 0 ? 'in_stock' : 'out_of_stock',
            'sku' => $request->sku,
            'tax_id' => $request->tax_id,
            'status' => $request->status,
            'is_warranty' => $request->is_warranty,
            'warranty_duration' => $request->is_warranty != 0 ? $request->warranty_duration : null,
            'is_returnable' => $request->is_returnable,
        ]);

        // store product categories
        $product->categories()->sync($request->categories);

        // Generate translations
        $this->generateTranslations(
            TranslationModels::Product,
            $product,
            'product_id',
            $request,
        );
        return $product;
    }

    public function updateProduct($request, $product)
    {
        if ($request->lang_code == allLanguages()->first()->code) {
            $image = $product->image;
            if ($request->hasFile('image')) {
                $image = file_upload($request->file('image'), $image);
            }

            // update product
            $product->update([
                'brand_id' => $request->brand_id,
                'slug' => $request->slug,
                'badge' => $request->badge,
                'price' => $request->price,
                'image' => $image,
                'discount' => $request->discount,
                'discount_type' => $request->discount_type,
                'cost_per_item' => $request->cost_per_item,
                'stock' => $request->quantity,
                'stock_status' => $request->quantity > 0 ? 'in_stock' : 'out_of_stock',
                'sku' => $request->sku,
                'tax_id' => $request->tax_id,
                'status' => $request->status,
                'is_warranty' => $request->is_warranty,
                'warranty_duration' => $request->is_warranty != 0 ? $request->warranty_duration : null,
                'is_returnable' => $request->is_returnable,
            ]);

            // update product categories
            $product->categories()->sync($request->categories);
        }

        // update translations
        $this->updateTranslations(
            $product,
            $request,
            $request->all(),
        );

        return $product;
    }

    public function getActiveProductById($id)
    {
        return $this->product->where('id', $id)->where('status', 1)->first();
    }

    public function deleteProduct($product)
    {
        // check if product has orders
        if ($product->orders->count() > 0) {
            return false;
        }

        file_delete($product->image);
        return $product->delete();
    }

    public function storeRelatedProducts($request, $product)
    {
        $ids = $request->product_id;


        // Remove existing related products
        $product->relatedProducts()->delete();

        // Add new related products
        foreach ($ids as $relatedProductId) {
            $product->relatedProducts()->create([
                'related_product_id' => $relatedProductId
            ]);
        }

        return $product;
    }
    public function getProductBySlug($slug): ?Product
    {
        return $this->product->where('slug', $slug)->first();
    }

    public function getProductsByCategory($category_id, $limit = 10): Collection
    {
        return $this->product->where('category_id', $category_id)->limit($limit)->get();
    }

    public function getProductsByBrand($brand_id, $limit = 10): Collection
    {
        return $this->product->where('brand_id', $brand_id)->limit($limit)->get();
    }

    public function getProductsByTag($tag, $limit = 10): Collection
    {
        return $this->product->where('tags', 'like', '%' . $tag . '%')->limit($limit)->get();
    }

    public function getFeaturedProducts($limit = 10): Collection
    {
        return $this->product->where('is_featured', 1)->limit($limit)->get();
    }

    public function getBestSellingProducts($limit = 10): Collection
    {
        return $this->product->where('is_best_selling', 1)->limit($limit)->get();
    }

    public function getTopRatedProducts($limit = 10): Collection
    {
        return $this->product->where('is_top_rated', 1)->limit($limit)->get();
    }

    public function getNewArrivalProducts($limit = 10): Collection
    {
        return $this->product->where('is_new_arrival', 1)->limit($limit)->get();
    }

    public function getRelatedProducts($product)
    {
        return $product->relatedProducts->pluck('related_product_id')->toArray();
    }

    public function getProductsBySearch($search, $limit = 10): Collection
    {
        return $this->product->where('name', 'like', '%' . $search . '%')->limit($limit)->get();
    }

    public function getProductsByPriceRange($min, $max, $limit = 10): Collection
    {
        return $this->product->whereBetween('price', [$min, $max])->limit($limit)->get();
    }

    public function getProductsByDiscount($limit = 10): Collection
    {
        return $this->product->where('discount', '>', 0)->limit($limit)->get();
    }

    public function getProductsByAttribute($attribute, $limit = 10): Collection
    {
        return $this->product->where('attributes', 'like', '%' . $attribute . '%')->limit($limit)->get();
    }

    public function getVariantBySku($sku)
    {
        return Variant::where('sku', $sku)->first();
    }

    public function getProductVariants($product)
    {
        $variants = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'sku' => $variant->sku,
                'price' => $variant->price,
                'attributes' => $variant->options->map(function ($option) {
                    return [
                        'attribute_id' => $option->attribute_id,
                        'attribute_value_id' => $option->attribute_value_id,
                        'attribute' => $option->attribute->name,
                        'attribute_value' => $option->attributeValue->name,
                    ];
                }),
            ];
        });

        return $variants;
    }

    public function getProductAttributesByVariant($product)
    {
        $variants = $product->variants->map(function ($variant) {
            return $variant->options->map(function ($option) {
                return [
                    'attribute_id' => $option->attribute_id,
                    'attribute_value_id' => $option->attribute_value_id,
                    'attribute' => $option->attribute->name,
                    'attribute_value' => $option->attributeValue->name,
                ];
            });
        });

        return $variants;
    }

    public function getProductAttributeValuesIds($product)
    {
        $variants = $product->variants->map(function ($variant) {
            return $variant->options->map(function ($option) {
                return $option->attribute_value_id;
            });
        });

        return $variants;
    }

    public function storeProductVariant($request, $product)
    {
        $variantData = $request->variant;
        $sellingPrices = $request->selling_price;
        $skus = $request->sku;

        foreach ($variantData as $key => $variantInfo) {


            // check if variant already exists
            $existingVariant = $product->variants->where('sku', $skus[$key])->first();

            if ($existingVariant) {
                continue;
            }

            $variantInfoArray = explode('-', $variantInfo);

            // Insert variant into the variants table
            $variant = Variant::create([
                'product_id' => $product->id,
                'sku' => $skus[$key],
                'price' => $sellingPrices[$key],
            ]);

            // Insert variant-specific information into the variant_attribute_values table
            foreach ($variantInfoArray as $attributeValue) {
                $attributeValueModel = AttributeValue::where('name', $attributeValue)->first();

                if ($attributeValueModel) {
                    VariantOption::create([
                        'variant_id' => $variant->id,
                        'attribute_id' => $attributeValueModel->attribute_id,
                        'attribute_value_id' => $attributeValueModel->id,
                    ]);
                }
            }
        }
    }

    public function getProductVariantById($variant_id)
    {
        return Variant::with('options', 'optionValues')->find($variant_id);
    }
    public function getProductVariant($variant_id)
    {
        return $this->getProductVariantById($variant_id);
    }
    public function updateProductVariant($request, $variant)
    {
        $variant->update([
            'price' => $request->selling_price,
            'sku' => $request->sku,
        ]);
        return $variant;
    }

    public function deleteProductVariant($variant)
    {
        // delete variant options
        $variant->options()->delete();

        return $variant->delete();
    }
    public function getFirstVariant($product_id)
    {
        return Variant::where('product_id', $product_id)->first();
    }



    public function storeProductGallery($request, $product)
    {
        $images = $request->images;

        $product->images = $images;

        $product->save();
        return $product;
    }
}
