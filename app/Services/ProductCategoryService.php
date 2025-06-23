<?php

namespace App\Services;

use App\Models\Category;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class ProductCategoryService
{
    use GenerateTranslationTrait;

    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    // Get all product categories

    public function getAllProductCategories()
    {
        $query = Category::query();

        if (request('keyword')) {
            $query->where(
                function ($q) {
                    $q->whereHas('translation', function ($us) {
                        $us->where('name', 'like', '%' . request('keyword') . '%');
                    });
                }
            );
        }

        if (request()->get('status') != '') {
            $query->where('status', request('status'));
        }
        if (request('order_by')) {
            $query->orderBy('id', request('order_by'));
        }
        if (request('par-page')) {
            $paginatedResult = $query->paginate(request('par-page') == 'all' ? '' : request('par-page'));
        } else {
            $paginatedResult = $query->paginate(20);
        }
        $paginatedResult->appends(request()->query());

        return $paginatedResult;
    }

    // store product category

    public function storeProductCategory($request)
    {
        $category = Category::create($request->all());
        $this->generateTranslations(
            TranslationModels::ProductCategory,
            $category,
            'product_category_id',
            $request,
        );
        return $category;
    }

    // update product category

    public function updateProductCategory($request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        $this->updateTranslations(
            $category,
            $request,
            $request->all(),
        );

        return $category;
    }

    // delete product category

    public function deleteProductCategory($id)
    {
        // check if category has products
        $category = Category::find($id);
        if ($category->products->count() > 0) {
            return false;
        }
        return Category::destroy($id);
    }

    // get all product categories for select

    public function getAllProductCategoriesForSelect()
    {
        return Category::where('status', '1')->get();
    }

    // get categories id by product id
    public function getCategoriesIdsByProductId($product_id)
    {
        return Category::whereHas('products', function ($query) use ($product_id) {
            $query->where('product_id', $product_id);
        })->pluck('id')->toArray();
    }

    public function getProductCategory($id)
    {
        return Category::find($id);
    }

    // get category which has products
    public function getActiveProductCategories()
    {
        return Category::with('translation')->whereHas('products', function ($query) {
            $query->where('status', '1');
        })->get();
    }
}
