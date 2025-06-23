<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
        $wishlists = auth('web')->user()->wishlists()->with('product')->paginate(20);
        return view('website.pages.utilities.wishlist',compact('wishlists'));
    }
}
