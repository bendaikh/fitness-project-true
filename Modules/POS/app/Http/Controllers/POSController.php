<?php

namespace Modules\POS\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\OrderSuccessfulMailJob;
use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use Modules\Order\app\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Coupon\app\Services\CouponService;
use Modules\GlobalSetting\app\Models\EmailTemplate;
use Modules\Order\app\Jobs\OrderSuccessfulMailJob as JobsOrderSuccessfulMailJob;
use Modules\Order\app\Models\Order;
use Modules\Order\app\Models\OrderDetails;

class POSController extends Controller
{
    protected $productService;
    protected $orderService;

    public function __construct(ProductService $productService, OrderService $orderService)
    {
        $this->middleware('auth:admin');
        $this->productService = $productService;
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        Paginator::useBootstrap();

        $products = Product::where('status', 1)->whereHas('categories', function ($query) {
            $query->where('status', 1);
        })->orderBy('id', 'desc');


        if ($request->category_id) {
            $products = $products->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category_id)
                    ->where('status', 1);
            });
        }

        if ($request->name) {
            $products = $products->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            });
        }

        $products = $products->paginate(5);

        $products = $products->appends($request->all());

        $categories = Category::where('status', 1)->get();
        $customers = User::orderBy('id', 'desc')->where('status', 'active')->where('is_banned', 'no')->get();


        $cart_contents = session('POSCART') ?? (object) session('POSCART');


        return view('pos::index')->with([
            'products' => $products,
            'categories' => $categories,
            'customers' => $customers,
            'cart_contents' => $cart_contents,
        ]);
    }

    public function load_products(Request $request)
    {
        Paginator::useBootstrap();

        $products = Product::where('status', 1)->whereHas('categories', function ($query) {
            $query->where('status', 1);
        })->orderBy('id', 'desc');

        if ($request->category_id) {
            $products = $products->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category_id)
                    ->where('status', 1);
            });
        }


        if ($request->name) {
            $products = $products->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            });
        }

        $products = $products->paginate(9);
        $products = $products->appends($request->all());

        return view('pos::ajax_products')->with([
            'products' => $products,
        ]);
    }

    public function load_product_modal($product_id)
    {
        $product = $this->productService->getActiveProductById($product_id);
        $variants = $this->productService->getProductVariants($product);
        if (!$product) {
            $notification = __('Something went wrong');
            return response()->json(['message' => $notification], 403);
        }

        if ($variants->count() != 0) {
            $variants = $variants;
        } else {
            $variants = array();
        }

        return view('pos::ajax_product_modal')->with([
            'product' => $product,
            'variants' => $variants,
        ]);
    }

    public function add_to_cart(Request $request)
    {
        $product = $this->productService->getActiveProductById($request->product_id);

        $attributes = '';
        $options = collect([]);

        if ($product->has_variant) {
            if (!$request->variant_sku) {
                $notification = __('Please select variant');
                return response()->json(['message' => $notification, 'alert-type' => 'error'], 403);
            } else {
                $prodVar = $this->productService->getVariantBySku($request->variant_sku);
                $attributes = $prodVar->attributes();
                $options = $prodVar->attribute_and_value_ids;
            }
        }

        $cart_contents = session()->get('POSCART');
        $cart_contents = $cart_contents ? $cart_contents : [];


        // check if item already exist in cart
        $item_exist = false;
        $sku = $request->variant_sku ? $request->variant_sku : $product->sku;
        if (count($cart_contents) > 0) {
            foreach ($cart_contents as $index => $cart_content) {
                if ($cart_content['sku'] == $sku) {
                    $item_exist = true;
                }
            }
        }

        if ($item_exist) {
            $notification = __('Item already added');
            return response()->json(['message' => $notification, 'cart' => session()->get('POSCART')], 403);
        }

        $data = array();
        $data["rowid"] = uniqid();
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['image'] = $product->image_url;
        $data['qty'] = $request->qty ? $request->qty : 1;
        $data['price'] = $request->variant_price ? $request->variant_price : $product->actual_price;
        $data['sub_total'] = $data['price'] * $data['qty'];
        $data['tax'] = $product->taxAmount($data['price']);
        $data['sku'] = $sku;

        if ($request->type == null) {
            $data['variant']['attribute'] =  $attributes;
            $data['variant']['options'] =  $options;
        }


        session()->put('POSCART', [...$cart_contents, $data["rowid"] => $data]);

        $cart_contents = session('POSCART');

        return view('pos::ajax_cart')->with([
            'cart_contents' => $cart_contents,
        ]);
    }

    public function cart_quantity_update(Request $request)
    {
        $cart_contents = session()->get('POSCART');

        $cart_contents = $cart_contents ? $cart_contents : [];

        $cart_contents[$request->rowid]['qty'] = $request->quantity;
        $cart_contents[$request->rowid]['sub_total'] = $cart_contents[$request->rowid]['price'] * $request->quantity;

        session()->put('POSCART', $cart_contents);

        $cart_contents = session()->get('POSCART');

        return view('pos::ajax_cart')->with([
            'cart_contents' => $cart_contents,
        ]);
    }

    public function remove_cart_item($rowId)
    {
        $cart_contents = session()->get('POSCART');
        $cart_contents = $cart_contents ? $cart_contents : [];
        unset($cart_contents[$rowId]);
        session()->put('POSCART', $cart_contents);

        $cart_contents = session()->get('POSCART');

        return view('pos::ajax_cart')->with([
            'cart_contents' => $cart_contents,
        ]);
    }

    public function cart_clear()
    {
        session()->put('POSCART', []);

        $notification = __('Cart clear successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function create_new_customer(Request $request)
    {


        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|unique:users',
            'phone' => 'required',
            "address" => 'required',
            "address_type" => "required",
        ], [
            'first_name.required' => __('First Name is required'),
            'last_name.required' => __('Last Name is required'),
            'email.unique' => __('Email already exist'),
            'phone.required' => __('Phone is required'),
            'address.required' => __('Address is required'),
            'address_type.required' => __('Address Type is required'),
        ])->validate();

        try {
            $user = new User();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->status = 'active';
            $user->email_verified_at = now();
            $user->save();

            $customers = User::orderBy('id', 'desc')->where('is_banned', 'no')->where('status', 'active')->get();

            Address::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->address_type,
                'default' => 1,
            ]);
            $customer_html = "<option value=''>" . __('Select Customer') . "</option><option value='walk-in-customer'>walk-in-customer</option>";
            foreach ($customers as $customer) {
                $customer_html .= "<option value=" . $customer->id . ">" . $customer->name . "-" . $customer->phone . "</option>";
            }

            $notification = __('Created Successfully');
            return response()->json(['customer_html' => $customer_html, 'message' => $notification]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    public function create_new_address(Request $request)
    {
        if ($request->customer_id == null) {
            session()->put('delivery_address', $request->except('_token'));

            $address = session('delivery_address');

            $notification = __('Address Create Successfully');
            $view = view('pos::ajax_walk_in_customer_address')->with([
                'address' => $address,
            ])->render();
            return [
                'message' => $notification,
                'view' => $view,
            ];
        }
        $validatedData = Validator::make($request->all(), [
            'address' => 'required',
            'address_type' => 'required',
        ], [
            'address.required' => __('Address is required'),
            'address_type.required' => __('Address type is required'),
        ])->validate();

        $user = User::find($request->customer_id);
        $is_exist = Address::where(['user_id' => $user->id])->count();

        $address = new Address();
        $address->user_id = $user->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->type = $request->address_type;
        if ($is_exist == 0) {
            $address->default = 1;
        } else {
            $address->default = 0;
        }
        $address->save();

        $notification = __('Create Successfully');
        return response()->json(['address' => $address, 'message' => $notification]);
    }

    public function place_order(Request $request)
    {
        if (session('POSCART') != null && count(session('POSCART')) == 0) {
            $notification = __('Your cart is empty!');
            $notification = array('message' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $validatedData = Validator::make($request->all(), [
            'customer_id' => 'required',
            'order_payment_details' => 'required',
            'order_payment_method' => 'required',
        ], [
            'customer_id.required' => __('Customer is required'),
            'payment_details.required' => __('Payment Details is required'),
            'payment_method.required' => __('Payment Method is required'),
        ])->validate();

        $user = null;
        if ($request->customer_id !=  'walk-in-customer') {
            $user = User::find($request->customer_id);
        }

        session()->put('payable_currency', session('currency_code'));
        $order_result = $this->orderStore($user, $request);

        $notification = __('Order created successfully');
        $notification = array('message' => $notification, 'alert-type' => 'success');
        return redirect()->route('admin.pos')->with($notification);
    }

    public function calculate_amount($delivery_charge)
    {

        $sub_total = 0;
        $coupon_price = 0.00;

        $cart_contents = session('POSCART');
        foreach ($cart_contents as $index => $cart_content) {
            $item_price = $cart_content['price'] * $cart_content['qty'];
            $item_total = $item_price + $cart_content['options']['optional_item_price'];
            $sub_total += $item_total;
        }

        $grand_total = ($sub_total - $coupon_price) + $delivery_charge;

        return array(
            'sub_total' => $sub_total,
            'coupon_price' => $coupon_price,
            'delivery_charge' => $delivery_charge,
            'grand_total' => $grand_total,
        );
    }

    public function orderStore($user, Request $request)
    {
        $cart = session('POSCART');

        $order = $this->orderService->storeOrder($request, $user,  $cart, 'pos');


        Session::forget('delivery_id');
        Session::forget('delivery_charge');
        Session::forget('coupon_price');
        Session::forget('offer_type');
        Session::forget('delivery_address');
        Session::forget('offer_type');
        session()->put('POSCART', []);

        return $order;
    }

    public function sendOrderSuccessMail($user, $order_result, $payment_method, $payment_status)
    {

        $template = EmailTemplate::where('name', 'Order Successfully')->first();

        $payment_status = $payment_status == 1 ? 'Paid' : 'Unpaid';
        $subject = $template->subject;
        $message = $template->message;

        $message = str_replace('{{user_name}}', $user->name, $message);
        $message = str_replace('{{total_amount}}', currency($order_result->total_amount), $message);
        $message = str_replace('{{payment_method}}', $payment_method, $message);
        $message = str_replace('{{payment_status}}', $payment_status, $message);
        $message = str_replace('{{order_status}}', 'Processing', $message);
        $message = str_replace('{{order_date}}', $order_result->created_at->format('d F, Y'), $message);

        dispatch(new JobsOrderSuccessfulMailJob($user, $subject, $message));
    }
    public function load_customer_address($id)
    {
        $addresses = Address::where('user_id', $id)->get();
        return view('pos::ajax_customer_address')->with([
            'addresses' => $addresses,
        ]);
    }

    public function posCartItemDetails($rowId)
    {
        $cart_contents = session()->get('POSCART');

        if ($cart_contents != null && count($cart_contents) > 0) {
            $item = $cart_contents[$rowId];
            return view('pos::ajax_cart_item_details')->with([
                'cart_content' => $item,
            ])->render();
        } else {
            return view('pos::ajax_cart_item_details')->with([
                'cart_content' => null,
            ]);
        }
    }

    public function check_cart_restaurant($id)
    {
        $menuItem = Product::find($id);

        $cart_contents = session()->get('POSCART');
        $cart_contents = $cart_contents ? $cart_contents : [];

        // clear cart if item from different restaurant
        if (isset($cart_contents) && count($cart_contents) > 0) {
            $currentRestaurantId = $menuItem->restaurant_id;
            foreach ($cart_contents as $index => $cart_content) {
                $cartItem = Product::find($cart_content['id']);
                if ($cartItem->restaurant_id != $currentRestaurantId) {

                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false]);
                }
            }
        }
    }

    public function modalClearCart()
    {
        session()->put('POSCART', []);
        return response()->json(['status' => true]);
    }

    public function applyCoupon(Request $request, CouponService $coupon)
    {
        $coupon = $coupon->coupon($request);
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
            Session::put('admin_coupon_code', $coupon->coupon_code);
            Session::put('admin_offer_percentage', $coupon->offer_percentage);
            Session::put('admin_coupon_price', $discount);

            $totalView = view('components.website.cart.subtotal')->with([
                'subtotal' => $request->amount,
                'tax' => $request->tax_amount,
            ])->render();
            $notification = __('Coupon applied successful');

            return response()->json(['message' => $notification, 'coupon_code' => $coupon->coupon_code, 'offer_percentage' => $coupon->offer_percentage, 'coupon_price' => $discount, "success" => true]);
        } else {
            $notification = __('Invalid Coupon');
            return response()->json(['message' => $notification], 403);
        }
    }
}
