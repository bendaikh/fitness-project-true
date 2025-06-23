@foreach ($cart_contents as $item)
    <li>
        <a href="{{ route('website.product-details', $item['slug']) }}" class="img">
            <img src="{{ asset($item['image']) }}" alt="product" class="img-fluid w-100">
        </a>
        <div class="text">
            <a href="{{ route('website.product-details', $item['slug']) }}">{{ $item['name'] }}</a>
            @if (isset($item['variant']))
                <p>
                    {{ $item['variant']['attribute'] }}
                </p>
            @endif
            <h6>{{ currency($item['price']) }} x {{ $item['qty'] }}</h6>
        </div>
        <span class="remove-from-cart" data-id="{{ $item['rowid'] }}"><i class="fal fa-times"></i></span>
    </li>
@endforeach
