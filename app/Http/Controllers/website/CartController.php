<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Coupon\app\Models\Coupon;

class CartController extends Controller
{
    protected $productService;
    protected $cartService;
    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }
    public function cart(): View
    {
        $cart_contents = session('cart');
        return view('website.pages.cart.cart', compact('cart_contents'));
    }


    public function payment(): View
    {
        return view('website.pages.cart.payment');
    }

    public function addToCart(Request $request)
    {

        $product = $this->productService->getActiveProductById($request->product_id);

        $attributes = '';
        $options = collect([]);

        $sku = $request->variant_sku ? $request->variant_sku : $product->sku;

        if ($product->has_variant) {
            if (!$request->variant_sku) {
                $prodVar = $this->productService->getFirstVariant($product->id);
            } else {
                $prodVar = $this->productService->getVariantBySku($request->variant_sku);
            }
            $sku = $prodVar->sku;
            $attributes = $prodVar->attributes();
            $options = $prodVar->attribute_and_value_ids;
        }


        $cart_contents = session()->get('cart');
        $cart_contents = $cart_contents ? $cart_contents : [];


        // check if item already exist in cart
        $item_exist = false;

        if (count($cart_contents) > 0) {
            foreach ($cart_contents as $index => $cart_content) {
                if ($cart_content['sku'] == $sku) {
                    $item_exist = true;
                }
            }
        }


        if ($item_exist) {
            $notification = __('Item already added');
            return response()->json(['message' => $notification, 'cart' => session()->get('cart')], 403);
        }

        $data = array();
        $data["rowid"] = uniqid('cart');
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['slug'] = $product->slug;
        $data['tax'] = $product->tax?->rate;
        $data['image'] = $product->image_url;
        $data['qty'] = $request->qty ? $request->qty : 1;
        $data['price'] = $request->variant_price ? $request->variant_price : $product->actual_price;
        $data['sub_total'] = $data['price'] * $data['qty'];
        $data['sku'] = $sku;

        if ($request->type == null) {
            $data['variant']['attribute'] =  $attributes;
            $data['variant']['options'] =  $options;
        }



        session()->put('cart', [...$cart_contents, $data["rowid"] => $data]);

        $cart_contents = session('cart');

        $view =  view('components.website.cart.cart-list')->with([
            'cart_contents' => $cart_contents,
        ])->render();

        $subtotal = 0;
        foreach ($cart_contents as $cart_content) {
            $subtotal += $cart_content['sub_total'];
        }

        return response()->json(['view' => $view, 'subtotal' => currency($subtotal), 'cartCount' => count($cart_contents)]);
    }

    public function updateCart(Request $request)
    {
        $this->removeCoupon(request());
        $cart_contents = $this->cartService->updateCart($request);

        $view =  view('components.website.cart.cart-list')->with([
            'cart_contents' => $cart_contents,
        ])->render();

        $subtotal = 0;

        foreach ($cart_contents as $cart_content) {
            $subtotal += $cart_content['sub_total'];
        }

        return response()->json(['view' => $view, 'subtotal' => currency($subtotal)]);
    }

    public function removeFromCart($rowid)
    {
        $cart_contents = $this->cartService->removeFromCart($rowid);
        $this->removeCoupon(request());

        $view =  view('components.website.cart.cart-list')->with([
            'cart_contents' => $cart_contents,

        ])->render();


        $subtotal = 0;
        $tax = 0;
        foreach ($cart_contents as $cart_content) {
            $subtotal += $cart_content['sub_total'];
            $tax += $cart_content['sub_total'] * $cart_content['tax'] / 100;
        }

        $totalView = view('components.website.cart.subtotal')->with([
            'subtotal' => $subtotal,
            'tax' => $tax,
        ])->render();

        return response()->json(['view' => $view, 'subtotal' => currency($subtotal), 'message' => __('Removed From Cart'), 'totalView' => $totalView, 'cartCount' => count($cart_contents)]);
    }

    public function updateCartQty(Request $request)
    {
        $cart_contents = $this->cartService->updateCart($request);

        $this->removeCoupon($request);

        if (!$cart_contents) {
            return response()->json(['message' => __('Item Not Found')], 403);
        }
        $subtotal = 0;
        $tax = 0;
        foreach ($cart_contents as $cart_content) {
            $subtotal += $cart_content['sub_total'];
            $tax += $cart_content['sub_total'] * $cart_content['tax'] / 100;
        }


        $totalView = view('components.website.cart.subtotal')->with([
            'subtotal' => $subtotal,
            'tax' => $tax,
        ])->render();

        $cartView =
            view('components.website.cart.cart-list')->with([
                'cart_contents' => $cart_contents,
            ])->render();


        return response()->json([
            'totalView' => $totalView,
            'cartView' => $cartView,
            'subtotal' => $subtotal,
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = $this->coupon($request);

        if ($coupon instanceof JsonResponse) {
            return $coupon;
        }

        if ($coupon) {
            $discount = 0;

            if ($coupon->offer_type == 1) {
                $coupon_price = $coupon->discount;
                $discountAmount = ($coupon_price / 100) * $request->amount;
                $discount = $discountAmount;
            } else {
                $discount = $coupon->discount;
            }

            /** when coupon will be handle for particular seller or author , above condition will be used  */
            Session::put('coupon_code', $coupon->coupon_code);
            Session::put('offer_percentage', $coupon->offer_percentage);
            Session::put('coupon_price', $discount);

            $totalView = view('components.website.cart.subtotal')->with([
                'subtotal' => $request->amount,
                'tax' => $request->tax_amount,
            ])->render();
            $notification = __('Coupon applied successful');

            return response()->json(['message' => $notification, 'coupon_code' => $coupon->coupon_code, 'offer_percentage' => $coupon->offer_percentage, 'coupon_price' => $discount, "totalView" => $totalView]);
        } else {
            $notification = __('Invalid Coupon');
            return response()->json(['message' => $notification], 403);
        }
    }

    public function removeCoupon(Request $request)
    {
        Session::forget('coupon_code');
        Session::forget('offer_percentage');
        Session::forget('coupon_price');

        $totalView = view('components.website.cart.subtotal')->with([
            'subtotal' => $request->amount,
            'tax' => $request->tax,
        ])->render();

        return response()->json(['totalView' => $totalView, 'message' => __('Coupon Removed')]);
    }

    public function clearCart()
    {
        session()->forget('cart');

        $this->removeCoupon(request());
        return response()->json(['message' => __('Cart Cleared')]);
    }


    public function workoutApplyCoupon(Request $request)
    {
        $coupon = $this->coupon($request);

        if ($coupon instanceof JsonResponse) {
            return $coupon;
        }

        if ($coupon) {
            $discount = 0;
            if ($coupon->offer_type == 1) {
                $coupon_price = $coupon->discount;
                $discountAmount = ($coupon_price / 100) * $request->amount;
                $discount = $discountAmount;
            } else {
                $discount = $coupon->discount;
            }

            $total = $request->amount - $discount;


            Session::put('workout_coupon_code', $coupon->coupon_code);
            Session::put('workout_coupon_price', $discount);
            $notification = __('Coupon applied successful');
            return response()->json(['message' => $notification, 'workout_coupon_code' => $coupon->coupon_code, 'total' => $total]);
        } else {
            $notification = __('Invalid Coupon');
            return response()->json(['message' => $notification], 403);
        }
    }

    public function workoutRemoveCoupon(Request $request)
    {
        Session::forget('workout_coupon_code');
        Session::forget('workout_coupon_price');
        $notification = __('Coupon Removed');
        return response()->json(['message' => $notification]);
    }


    private function coupon(Request $request)
    {
        $rules = [
            'coupon' => 'required',
            'author_id' => 'required',
        ];
        $customMessages = [
            'coupon.required' => __('Coupon is required'),
            'author_id.required' => __('Author id is required'),
        ];

        $request->validate($rules, $customMessages);

        $coupon = Coupon::where(['coupon_code' => $request->coupon, 'status' => 'active'])->first();

        if ($request->coupon == null) {
            $notification = __('Coupon Field is required');
            return response()->json(['message' => $notification], 403);
        }

        $coupon = Coupon::where(['coupon_code' => $request->coupon, 'status' => 'active'])->first();

        if (!$coupon) {
            $notification = __('Invalid Code');
            return response()->json(['message' => $notification], 403);
        }
        if ($coupon->expired_date < date('Y-m-d')) {
            $notification = __('Coupon already expired');
            return response()->json(['message' => $notification], 403);
        }

        if ($coupon->apply_qty >=  $coupon->max_quantity) {
            $notification = __('Sorry! You can not apply this coupon');
            return response()->json(['message' => $notification], 403);
        }
        if ($coupon->min_price && $request->amount < $coupon->min_price) {
            $notification = __("Minimum purchase amount should be " . $coupon->min_price);
            return response()->json(['message' => $notification], 403);
        }

        return $coupon;
    }
}
