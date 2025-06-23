@php
    $discount = session('coupon_price') != null ? session('coupon_price') : 0;

    $total = $subtotal - $discount + $tax;
@endphp

<input type="hidden" name="subTotal" value="{{ $subtotal }}">
<input type="hidden" name="tax" value="{{ $tax }}">
<h5>Sub Total<span class="subtotal">{{ currency($subtotal) }}</span></h5>
<p>Tax<span class="tax">{{currency($tax)}}</span></p>
<p>Discount<span class="discount">{{currency($discount)}}</span></p>
<h6>Total <span class="total">{{currency($total)}}</span></h6>
