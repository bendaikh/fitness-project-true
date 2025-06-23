<div class="wsus__billing_summary">
    <h4>{{ __('Billing Summery') }}</h4>
    <ul class="wsus__billing_product">
        @php
            $subtotal = 0;
            $tax = 0;
            $coupon = session('coupon_price') != null ? session('coupon_price') : 0;
            if (request()->type == 'workout') {
                $coupon = session('workout_coupon_price') != null ? session('workout_coupon_price') : 0;
            }

        @endphp

        @foreach ($cart_contents as $item)
            @php
                $subtotal += $item['sub_total'];
                $tax += ($item['sub_total'] * $item['tax']) / 100;
            @endphp
            <li>
                @if (request()->type == 'workout')
                    <a href="{{ route('website.workout.details', $item['slug']) }}" class="img">
                    @else
                        <a href="{{ route('website.product-details', $item['slug']) }}" class="img">
                @endif

                <img src="{{ asset($item['image']) }}" alt="product" class="img-fluid w-100">
                </a>
                <div class="text">
                    <a href="javascript:;">{{ $item['name'] }}</a>
                    @if (isset($item['variant']))
                        <p>
                            {{ $item['variant']['attribute'] }}
                        </p>
                    @endif
                    <h6>{{ currency($item['price']) }} x {{ $item['qty'] }}</h6>
                </div>
            </li>
        @endforeach
    </ul>
    @php

        $deliveryArea = session('delivery_area');
        if ($deliveryArea) {
            $delivery_charge = $deliveryArea->minimum_order <= $subtotal ? $deliveryArea->fee : 0;
            $delivery_charge = $deliveryArea->is_free ? 0 : $delivery_charge;
            session()->put('delivery_fee', $delivery_charge);
        } else {
            $delivery_charge = 0;
        }

        $total = $subtotal + $tax - $coupon + $delivery_charge;
        session()->put('total_amount', $total);
        session()->put('tax_amount', $tax);
        session()->put('sub_total', $subtotal);

    @endphp
    <div class="wsus__total_price">
        <h3>{{ __('Sub Total') }}<span>{{ currency($subtotal) }}</span></h3>
        @if (request()->type != 'workout')
            <p>{{ __('Shipping Charge') }}<span>{{ currency($delivery_charge) }}</span></p>
        @endif
        <p>{{ __('Discount') }}<span>
                @if ($coupon)
                    -
                @endif {{ currency($coupon) }}
            </span></p>
        @if (request()->type != 'workout')
            <p>{{ __('Tax') }}<span>{{ currency($tax) }}</span></p>
        @endif
    </div>
    <h5>{{ __('Total') }}<span>{{ currency($total) }}</span></h5>
</div>
