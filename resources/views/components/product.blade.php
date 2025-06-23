<div class="col-sm-6 col-lg-6 col-xl-4 wow fadeInUp">
    <div class="wsus__product_item">
        <div class="img">
            <a href="{{ route('website.product-details', $product->slug) }}">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="img-fluid w-100">
            </a>
            <a href="javascript:;" class="add_cart" data-id="{{ $product->id }}"
                @if ($product->has_variant) onclick="viewCartDetails({{ $product->id }})" @else onclick="singleAddToCart({{ $product->id }})" @endif>
                <span><img src="{{ asset('website') }}/images/cart_icon_2.png" alt="cart"
                        class="img-fluid w-100"></span>
                {{ __('Add To Cart') }}
            </a>
            <ul>

                <li><a href="javascript:;" class="add_to_wishlist" data-id="{{ $product->id }}"><i
                            class="fal fa-heart"></i></a></li>
            </ul>
        </div>

        @if ($product->badge)
            <span class="new">{{ $product->badge }}</span>
        @endif
        <div class="text">
            <a href="{{ route('website.product-details', $product->slug) }}" class="title">{{ $product->name }}</a>
            <p>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $product->avgReview)
                        <i class="fas fa-star"></i>
                    @elseif($i - $product->avgReview == 0.5)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </p>
            <h4>{{ currency($product->actual_price) }}</h4>
        </div>
    </div>
</div>
