<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Services\ShippingMethodService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $shippingService;
    public function __construct(ShippingMethodService $shippingService)
    {
        $this->middleware('auth:web');
        $this->shippingService = $shippingService;
    }
    public function checkout()
    {
        $cart_contents = session("cart");

        if ($cart_contents == null || count($cart_contents) == 0) {
            $notification = __('Your Cart is Empty. Please add some items first!');
            return redirect()->route('website.shop')->with([
                'message' => $notification,
                'alert-type' => 'error',
            ]);
        }

        $states = State::all();

        $shipping = $this->shippingService->getActive();

        $addresses = auth('web')->user()->addresses()->with('state', 'city')->orderBy('id', 'desc')->get();
        return view('website.pages.cart.checkout', compact('cart_contents', "states", 'addresses', 'shipping'));
    }
}
