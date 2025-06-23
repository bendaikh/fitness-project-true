<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\AttributeService;
use App\Services\BrandService;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Tax\app\Services\TaxService;

class ProductController extends Controller
{
    use RedirectHelperTrait;
    private ProductService $productService;
    private ProductCategoryService $categoryService;
    private AttributeService $attributeService;
    private BrandService $brandService;
    private TaxService $taxService;
    public function __construct(ProductService $productService, ProductCategoryService $categoryService, AttributeService $attributeService, BrandService $brandService, TaxService $taxService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->attributeService = $attributeService;
        $this->brandService = $brandService;
        $this->taxService = $taxService;
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('product.view');
        try {
            $products = $this->productService->getProducts();

            if (request('par-page')) {

                $products = $products->paginate(request('par-page') == 'all' ? '' : request('par-page'));
            } else {
                $products = $products->paginate(20);
            }


            $products->appends(request()->query());
            return view('admin.pages.products.index', compact('products'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        checkAdminHasPermissionAndThrowException('product.create');
        $categories = $this->categoryService->getAllProductCategoriesForSelect();
        $brands = $this->brandService->getActiveBrands();
        $taxes = $this->taxService->getActiveTax();
        return view('admin.pages.products.create', compact('categories', 'brands', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        checkAdminHasPermissionAndThrowException('product.store');
        DB::beginTransaction();
        try {
            $product = $this->productService->storeProduct($request);

            DB::commit();
            if ($product->id) {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.product.edit', ['product' => $product->id, 'code' => getSessionLanguage()], [
                    'message' => 'Product created successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.product.create', [], [
                    'message' => 'Product creation failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.edit');
        try {
            $product = $this->productService->getProduct($id);
            $productCategories = $this->categoryService->getCategoriesIdsByProductId($id);

            $categories = $this->categoryService->getAllProductCategoriesForSelect();
            $brands = $this->brandService->getActiveBrands();
            $taxes = $this->taxService->getActiveTax();
            return view('admin.pages.products.edit', compact('categories', 'brands', 'product', 'productCategories', 'taxes'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            abort(500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.update');
        try {
            DB::beginTransaction();
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $product = $this->productService->updateProduct($request, $product);
            DB::commit();
            if ($product->id) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.product.index', [], [
                    'message' => 'Product updated successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.product.index', [], [
                    'message' => 'Product update failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.delete');
        try {
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $product = $this->productService->deleteProduct($product);
            if ($product) {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.product.index', [], [
                    'message' => 'Product deleted successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.product.index', [], [
                    'message' => 'Product deletion failed. Product has orders',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }


    public function status(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.update');
        $product = $this->productService->getProduct($id);
        $product = $this->productService->updateStatus($product);
        return response()->json(['message' => 'Status updated successfully', 'status' => 200], 200);
    }
    /**
     *
     * related product view
     */
    public function related_product(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.related.product.view');
        try {
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $relatedProducts = $this->productService->getRelatedProducts($product);
            $products = $this->productService->getProducts()->whereNot('id', $product->id)->paginate(20);
            return view('admin.pages.products.related_product', compact('product', 'relatedProducts', 'products'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     *
     * related product store
     */

    public function related_product_store(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.related.product.update');
        try {
            DB::beginTransaction();
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $relatedProducts = $this->productService->storeRelatedProducts($request, $product);
            DB::commit();
            if ($relatedProducts) {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.related-products', [$product->id], [
                    'message' => 'Related Products updated successfully',
                    'alert-type' => 'success',
                ]);
            } else {
                return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.related-products', [$product->id], [
                    'message' => 'Related Products update failed',
                    'alert-type' => 'error',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.variant.view');
        try {
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $variants = $this->productService->getProductVariants($product);
            return view('admin.pages.products.product_variant', compact('product', 'variants'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant_create(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.variant.create');
        try {
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $attributes = $this->attributeService->getAllAttributesForSelect();
            return view('admin.pages.products.product_variant_create', compact('product', 'attributes'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant_store(Request $request, string $id)
    {

        checkAdminHasPermissionAndThrowException('product.variant.store');
        try {
            DB::beginTransaction();
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $this->productService->storeProductVariant($request, $product);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::CREATE->value, 'admin.product-variant', [$product->id], [
                'message' => 'Product Variant created successfully',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant_edit(string $variant_id)
    {
        checkAdminHasPermissionAndThrowException('product.variant.edit');
        try {
            $variant = $this->productService->getProductVariant($variant_id);
            if (!$variant) {
                return back()->with([
                    'message' => 'Product Variant not found',
                    'alert-type' => 'error',
                ]);
            }
            $attributes = $this->attributeService->getAllAttributesForSelect();
            $product = $variant->product;
            return view('admin.pages.products.product_variant_edit', compact('variant', 'attributes', 'product'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant_update(Request $request, string $variant_id)
    {
        checkAdminHasPermissionAndThrowException('product.variant.update');
        try {
            DB::beginTransaction();
            $variant = $this->productService->getProductVariant($variant_id);
            if (!$variant) {
                return back()->with([
                    'message' => 'Product Variant not found',
                    'alert-type' => 'error',
                ]);
            }
            $this->productService->updateProductVariant($request, $variant);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.product-variant', [$variant->product->id], [
                'message' => 'Product Variant updated successfully',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_variant_delete(string $variant_id)
    {
        checkAdminHasPermissionAndThrowException('product.variant.delete');
        try {
            DB::beginTransaction();
            $variant = $this->productService->getProductVariant($variant_id);
            if (!$variant) {
                return back()->with([
                    'message' => 'Product Variant not found',
                    'alert-type' => 'error',
                ]);
            }
            $this->productService->deleteProductVariant($variant);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::DELETE->value, 'admin.product-variant', [$variant->product->id], [
                'message' => 'Product Variant deleted successfully',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }
    public function product_gallery(string $id)
    {
        checkAdminHasPermissionAndThrowException('product.gallery');
        try {
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            return view('admin.pages.products.gallery', compact('product'));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    public function product_gallery_store(Request $request, string $id)
    {
        checkAdminHasPermissionAndThrowException('product.gallery.update');
        try {
            DB::beginTransaction();
            $product = $this->productService->getProduct($id);
            if (!$product) {
                return back()->with([
                    'message' => 'Product not found',
                    'alert-type' => 'error',
                ]);
            }
            $this->productService->storeProductGallery($request, $product);
            DB::commit();
            return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.product-gallery', [$product->id], [
                'message' => 'Product Gallery updated successfully',
                'alert-type' => 'success',
            ]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            return back()->with([
                'message' => 'Something Went Wrong',
                'alert-type' => 'error',
            ]);
        }
    }
}
