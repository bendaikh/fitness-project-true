@php
    if (auth()->check()) {
        $wishlists = App\Models\Wishlist::where('user_id', Auth::id())->count();
    } else {
        $wishlists = 0;
    }
@endphp

<ul class="right_menu d-flex flex-wrap align-items-center">
    @if (isShopActive())

        <li>
            <a href="{{ route('website.wishlist') }}" class="wsus__manu_cart icon">
                <span>
                    <img src="{{ asset('website') }}/images/wishlist.png" alt="wishlist" class="img-fluid">
                </span>
                <span class="wishlist_count">{{ $wishlists }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('website.cart') }}" class="wsus__manu_cart icon">
                <span>
                    <img src="{{ asset('website') }}/images/cart_icon.png" alt="cart" class="img-fluid">
                </span>
                <span class="cart_count">{{ count(session('cart') ?? []) }}</span>
            </a>
            @php
                $cart_contents = session('cart');
                $subtotal = 0;
                if ($cart_contents != null) {
                    foreach ($cart_contents as $cart_content) {
                        $subtotal += $cart_content['sub_total'];
                    }
                }

            @endphp
            <div class="wsus__droap_cart">
                <h5>{{ __('Cart Items') }}<a href="{{ route('website.cart') }}">{{ __('View Cart') }}</a></h5>
                <ul class="wsus__droap_cart_list">
                    @if ($cart_contents != null)
                        @include('components.website.cart.cart-list', ['cart_contents' => $cart_contents])
                    @endif
                </ul>
                @if ($cart_contents != null)
                    <div class="wsus__droap_total_price">
                        <h3>{{ __('Sub Total') }} :<span class="cart_total">{{ currency($subtotal) }}</span> </h3>
                    </div>
                @else
                    @include('components.website.cart.no-item-cart')
                @endif
                <a href="{{ route('website.checkout') }}"
                    class="common_btn common_btn_2 checkout_btn {{ $subtotal == 0 ? 'invisible' : 'visible' }}">{{ __('Continue To Checkout') }}</a>
            </div>
        </li>
    @endif
    <li>
        <a href="javascript:;" class="icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight">
            <span>
                <img src="{{ asset('website') }}/images/toggle_icon.png" alt="user" class="img-fluid">
            </span>
        </a>
    </li>
</ul>
