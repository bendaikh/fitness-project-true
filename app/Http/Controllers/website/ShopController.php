<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\PagesUtility;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Modules\GlobalSetting\app\Models\CustomPagination;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Models\OrderDetails;
use Modules\Order\app\Models\OrderReview;

class ShopController extends Controller
{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService, ProductCategoryService  $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index(): View
    {
        $paginate = CustomPagination::where('section_name', 'Product List')->first();
        $products = $this->productService->getActiveProducts()->paginate($paginate->item_qty);

        $priceRange = PagesUtility::first()?->price_range ?? 0;
        // categories
        $categories = $this->categoryService->getActiveProductCategories();

        return view('website.pages.shop.index', compact('products', "categories", "priceRange"));
    }
    public function details(string $slug)
    {
        $product = $this->productService->getProductBySlug($slug);

        if (!$product) {
            return to_route('website.404');
        }

        $relatedProduct = $product->relatedProduct;

        // can give reviews
        $canGiveReview = false;
        if (auth('web')) {
            $orderDetails = Order::where('user_id', auth('web')->id())->where('order_status', 'success')
                ->pluck('id')
                ->flatMap(function ($orderId) use ($product) {
                    return OrderDetails::where('order_id', $orderId)
                        ->where('product_id', $product->id)
                        ->get();
                })
                ->first();
            if ($orderDetails && !(OrderReview::where('product_id', $product->id)->exists())) {
                $canGiveReview = true;
            }
        }

        $shareLinks = (object) \Share::currentPage()
            ->facebook()
            ->linkedin()
            ->twitter()
            ->pinterest()
            ->getRawLinks();

        $reviews = OrderReview::where('product_id', $product->id)->paginate(4);

        return view('website.pages.shop.details', compact('product', 'relatedProduct', 'canGiveReview', 'reviews', 'shareLinks'));
    }
    public function productModal($id)
    {
        $product = $this->productService->getProduct($id);
        return view('components.product-modal', compact('product'))->render();
    }

    public function postReview(Request $request)
    {
        $userId = auth('web')->id();

        if (!$userId) {
            return back()->with(['message' => __('You must login to give review'), 'alert-type' => 'error']);
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $orderDetails = Order::where('user_id', $userId)->where('order_status', 'success')
            ->pluck('id')
            ->flatMap(function ($orderId) use ($request) {
                return OrderDetails::where('order_id', $orderId)
                    ->where('product_id', $request->product_id)
                    ->get();
            })
            ->first();

        if ($orderDetails && !(OrderReview::where('product_id', $request->product_id)->exists())) {
            OrderReview::create([
                'order_id' => $orderDetails->order_id,
                'product_id' => $request->product_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'user_id' => $userId,
                'status' => 1,
            ]);
            return back()->with(['message' => __('Review submitted successfully'), 'alert-type' => 'success']);
        }
        return back()->with(['message' => __('You can not give review'), 'alert-type' => 'error']);
    }
}
