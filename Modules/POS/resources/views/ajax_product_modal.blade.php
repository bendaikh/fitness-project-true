<form id="modal_add_to_cart_form" method="POST">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="price" value="0" id="modal_price">
    <input type="hidden" name="variant_price" value="0" id="modal_variant_price">
    <input type="hidden" name="variant_sku" value="0" id="modal_variant_sku">

    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card shadow-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                <img src="{{ asset($product->image_url) }}" class="w-100" />
                                <a href="javascript:;">
                                    <div class="hover-overlay">
                                        <div class="mask">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5>{{ $product->name }}</h5>
                            <div class="d-flex flex-row">
                                <div class="text-danger mb-1 me-2">

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->avgReview)
                                            <i class="fas fa-star"></i>
                                        @elseif($i - $product->avgReview == 0.5)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span>({{ $product->totalReviews() }})</span>
                            </div>
                            <p class="text-truncate mb-4 mb-md-0">
                                {!! $product->short_description !!}
                            </p>

                            <p class="text-truncate mb-4 mb-md-0">
                            <div class="row">
                                @foreach ($product->attribute_and_values as $attributes)
                                    @php
                                        $count = count($product->attribute_and_values);
                                    @endphp
                                    <div
                                        class="-mt-1 {{ $count >= 3 ? 'col-md-4 col-sm-6 col-xs-12' : 'col-md-6 col-sm-6 col-xs-12' }}">
                                        <select name="{{ $attributes['attribute'] }}" id=""
                                            class="form-select attributes">
                                            <option value="" selected disabled>
                                                {{ ucfirst($attributes['attribute']) }}</option>
                                            @foreach ($attributes['attribute_values'] as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                            </p>

                        </div>
                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                                <h4 class="mb-1 me-1 productPrice">{{ currency($product->actual_price) }}</h4>

                                @if ($product->price != $product->actual_price)
                                    <span class="text-danger"><s>{{ currency($product->price) }}</s></span>
                                @endif
                            </div>

                            {{-- quantity --}}

                            <div class="d-flex flex-column mt-4">
                                <input type="number" class="form-control" min='1'
                                    placeholder="{{ __('Quantity') }}" value="1" name="qty">
                            </div>


                            <div class="d-flex flex-column mt-4">
                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-primary btn-sm mt-2" type="button" id="modal_add_to_cart">
                                    {{ __('Add to cart') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    (function($) {
        "use strict";
        $(document).ready(function() {
            let attributes = @json($product->VariantsPriceAndSku);
            attributes = Object.values(attributes);

            $("#modal_add_to_cart").on("click", function(e) {
                e.preventDefault();
                const variant_sku = $('[name="variant_sku"]').val();

                if (variant_sku) {

                    $.ajax({
                        type: 'get',
                        data: $('#modal_add_to_cart_form').serialize(),
                        url: "{{ url('/admin/pos/add-to-cart') }}",
                        success: function(response) {
                            $(".shopping-card-body").html(response)
                            toastr.success("{{ __('Item added successfully') }}")
                            calculateTotalFee();

                            $("#cartModal").modal('hide');
                        },
                        error: function(response) {
                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error(response.responseJSON.message)
                            }
                        }
                    });

                } else {
                    toastr.error("{{ __('Please select a size') }}")
                }
            });

            $('.attributes').on('change', function() {
                let attribute_values = [];
                $('.attributes').each(function() {
                    attribute_values.push($(this).val());
                });

                let selected_variant = attributes.find(function(variant) {
                    return variant['attribute_value_ids'].sort().toString() ==
                        attribute_values.sort().toString();
                });
                if (selected_variant != undefined && selected_variant.price) {

                    $("#modal_variant_price").val(removeCurrency(selected_variant.currency_price))
                    $("#modal_variant_sku").val(selected_variant.sku)

                    $('.productPrice').text(selected_variant.currency_price)
                    calculateModalPrice()
                }
            });
        });
    })(jQuery);

    function calculateModalPrice() {
        let optional_price = 0;
        let product_qty = $(".modal_product_qty").val();
        $("input[name='optional_items[]']:checked").each(function() {
            let checked_value = $(this).data('optional-item');
            optional_price = parseInt(optional_price) + parseInt(checked_value);
        });

        let variant_price = $("#modal_variant_price").val();
        let main_price = parseInt(variant_price) * parseInt(product_qty);

        let total = parseInt(main_price) + parseInt(optional_price);

        // check if total has decimal point
        if (total % 1 == 0) {
            total += '.00'
        }

        $(".modal_grand_total").html(total)
        $("#modal_price").val(total);
    }
</script>
