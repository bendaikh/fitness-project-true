<table class="table table-bordered">
    <thead>
        <th width="35%">{{ __('Item') }}</th>
        <th width="30%">{{ __('Qty') }}</th>
        <th width="30%">{{ __('Price') }}</th>
        <th width="5%">{{ __('Action') }}</th>
    </thead>
    <tbody>
        @php
            $cumalitive_sub_total = 0;
            $total = 0;
            $tax = 0;
        @endphp
        @foreach ($cart_contents as $cart_index => $cart_content)
            @php
                $tax += $cart_content['tax'] * $cart_content['qty'];
            @endphp
            <tr>
                <td>
                    <p>{{ $cart_content['name'] }}</p>
                    @if (isset($cart_content['variant']))
                        <span>
                            {{ $cart_content['variant']['attribute'] }}
                        </span>
                    @endif
                </td>
                <td data-rowid="{{ $cart_content['rowid'] }}" class="px-3">
                    <input min="1" type="number" value="{{ $cart_content['qty'] }}"
                        class="pos_input_qty form-control">
                </td>

                @php
                    $sub_total = $cart_content['sub_total'];
                    $cumalitive_sub_total += $sub_total;
                @endphp

                <td>{{ currency($sub_total) }}</td>
                <td>
                    <a href="javascript:;" onclick="removeCartItem('{{ $cart_content['rowid'] }}')"
                        class="d-block p-2 text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="w-25 font-weight-bolder">{{ __('Subtotal') . ' : ' }}</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {{ currency_icon() }}
                </div>
            </div>
            <input type="text" class="form-control currency" id="sub_total"
                value="{{ remove_icon(currency($cumalitive_sub_total ?: 0.0)) }}" readonly>
        </div>
    </div>
    <div class="justify-content-between align-items-center mt-3 delivery-container d-none">
        <div class="w-25 font-weight-bolder">{{ __('Delivery') . ' : ' }}</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {{ currency_icon() }}
                </div>
            </div>
            <input type="text" class="form-control currency" id="delivery_fee"
                placeholder="{{ __('Delivery Fee') }}" disabled>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="w-25 font-weight-bolder">{{ __('Tax') . ' : ' }}</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {{ currency_icon() }}
                </div>
            </div>
            <input type="text" class="form-control currency" id="tax_fee" placeholder="{{ __('Tax') }}"
                value="{{ $tax }}" readonly>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="w-25 font-weight-bolder">{{ __('Discount') . ' : ' }}</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text discount_icon">
                    {{ currency_icon() }}
                </div>
            </div>
            <input type="text" class="form-control currency" id="discount" placeholder="{{ __('Discount') }}">
            <select class="selectric px-2" name="discount_type">
                <option value="fixed" selected>{{ __('Fixed') }}</option>
                <option value="percent">{{ __('Percent') }}</option>
            </select>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center my-3">
        <div class="w-25 font-weight-bolder">{{ __('Total') . ' : ' }}</div>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    {{ currency_icon() }}
                </div>
            </div>
            <input type="text" class="form-control currency" id="total_fee"
                value="{{ remove_icon(currency($cumalitive_sub_total ?: 0.0)) }}" readonly>
        </div>
    </div>
</div>
<input type="hidden" id="cart_sub_total" value="{{ $cumalitive_sub_total }}">


<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            deliveryMethod()
            $(".pos_input_qty").on("change keyup", function(e) {
                $('.preloader_area').removeClass('d-none');
                let quantity = $(this).val();
                let parernt_td = $(this).parents('td');
                let rowid = parernt_td.data('rowid')

                $.ajax({
                    type: 'get',
                    data: {
                        rowid,
                        quantity
                    },
                    url: "{{ route('admin.cart-quantity-update') }}",
                    success: function(response) {
                        $(".shopping-card-body").html(response)
                        calculateTotalFee();
                        $('.preloader_area').addClass('d-none');
                    },
                    error: function(response) {
                        if (response.status == 500) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }

                        if (response.status == 403) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                        $('.preloader_area').addClass('d-none');
                    }
                });
            });
        });
    })(jQuery);

    function removeCartItem(rowId) {
        $.ajax({
            type: 'get',
            url: "{{ url('admin/pos/remove-cart-item') }}" + "/" + rowId,
            success: function(response) {
                $(".shopping-card-body").html(response)
                calculateTotalFee();
                toastr.success("{{ __('Remove successfully') }}")
            },
            error: function(response) {
                toastr.error("{{ __('Server error occurred') }}")
            }
        });
    }
</script>
