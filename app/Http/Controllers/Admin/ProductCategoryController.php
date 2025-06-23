<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Services\ProductCategoryService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    use RedirectHelperTrait;
    protected $category;
    public function __construct(ProductCategoryService $category)
    {
        $this->category = $category;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('product.category.view');
        $categories = $this->category->getAllProductCategories();
        return view('admin.pages.products.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('product.category.create');
        $categories = $this->category->getAllProductCategoriesForSelect();
        return view('admin.pages.products.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        checkAdminHasPermissionAndThrowException('product.category.store');
        DB::beginTransaction();
        try {
            $category = $this->category->storeProductCategory($request);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.category.index', ['category' => $category->id, 'code' => getSessionLanguage()]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.category.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.category.edit');
        $cat = $this->category->getProductCategory($id);
        $categories = $this->category->getAllProductCategoriesForSelect();
        return view('admin.pages.products.category.edit', compact('categories', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.category.update');
        DB::beginTransaction();

        try {
            $this->category->updateProductCategory($request, $id);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.category.index');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.category.delete');
        try {
            $category = $this->category->deleteProductCategory($id);
            if (!$category) {
                return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.category.index', [], [
                    'message' => 'Category has products',
                    'alert-type' => RedirectType::ERROR->value,
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.category.index');
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return $this->redirectWithMessage(RedirectType::ERROR->value, 'admin.category.index');
        }
    }

    public function status(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.category.update');
        $category = $this->category->getProductCategory($id);
        $status = $category->status == 1 ? 0 : 1;
        $category->update(['status' => $status]);
        return response()->json(['success' => true, 'message' => __('Category Status Changed Successfully')]);
    }
}
