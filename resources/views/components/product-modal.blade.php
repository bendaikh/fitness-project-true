<form id="modal_add_to_cart_form">
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="price" value="0" id="modal_price">
    <input type="hidden" name="variant_price" value="0" id="modal_variant_price">
    <input type="hidden" name="variant_sku" value="0" id="modal_variant_sku">
    <div class="row">
        <div class="col-md-5 col-xl-5">
            <div class="wsus__modal_img">
                <img src="{{ asset($product->image_url) }}" alt="product" class="img-fluid w-100">
            </div>
        </div>
        <div class="col-md-7 col-xl-7">
            <div class="wsus__modal_text">
                <h2>{{ $product->name }}</h2>
                <span>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product->avgReview)
                            <i class="fas fa-star"></i>
                        @elseif($i - $product->avgReview == 0.5)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                    <b>{{ $product->totalReviews() }} {{ __('Reviews') }}</b>
                </span>
                <h6 class="productPrice">{{ currency($product->actual_price) }}</h6>
                <p>
                    {!! $product->short_description !!}
                </p>
                <ul class="details">
                    @foreach ($product->attribute_and_values as $attributes)
                        @php
                            $count = count($product->attribute_and_values);
                        @endphp
                        <li><span>{{ ucfirst($attributes['attribute']) }}</span>:
                            @foreach ($attributes['attribute_values'] as $value)
                                <input type="button" value="{{ $value['value'] }}"
                                    style="{{ $loop->first ? 'margin-left:20px;' : '' }}" class="attr"
                                    data-id="{{ $value['id'] }}">
                            @endforeach
                        </li>
                    @endforeach
                </ul>
                <div class="wsus__modal_add_cart">
                    <div class="wsus__modal_quantity">
                        <button class="minus" type="button"><i class="far fa-minus"></i></button>
                        <input type="text" placeholder="01" value="1" class="modal_product_qty" name="qty">
                        <button class="plus" type="button"><i class="far fa-plus"></i></button>
                    </div>
                    <div class="wsus__modal_buy_cart">
                        <a href="javascript:;" class="cart"><img src="{{ asset('website') }}/images/Shoping_cart.png"
                                alt="cart" class="img-fluid w-100"></a>
                        <a href="javascript:;" class="common_btn common_btn_2 buyNow">{{ __('Buy Now') }}</a>
                    </div>
                </div>
                <ul class="wishlist d-flex flex-wrap">
                    <li><a href="javascript:;"><span><i class="fal fa-heart"></i></span>{{ __('Add to WishList') }}</a>
                    </li>
                    <li><a href="javascript:;"><span><i class="fal fa-share-alt"></i></span>{{ __('Share') }}</a>
                    </li>
                </ul>
                @php
                    $tags = json_decode($product->tags);
                @endphp
                <ul class="details">
                    <li>{{ __('SKU') }}:<span class="sku">{{ $product->sku }}</span></li>
                    <li>{{ __('Categories') }}:<span>
                            @foreach ($product->categories as $category)
                                {{ $category->name }} @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span></li>
                    <li>{{ __('Tags') }}:<span>
                            @foreach ($tags as $tag)
                                {{ $tag->value }} @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                    </li>
                </ul>
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

                            const noCart = $('.no-cart')

                            if (noCart) {
                                noCart.remove();
                            }
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

            $(".minus").on('click', function() {
                let product_qty = $(".modal_product_qty").val();
                if (product_qty > 1) {
                    $(".modal_product_qty").val(parseInt(product_qty) - 1);

                }
            })
            $(".plus").on('click', function() {
                let product_qty = $(".modal_product_qty").val();
                $(".modal_product_qty").val(parseInt(product_qty) + 1);

            })

            $(".attr").on('click', function() {
                // add class selectedAttr
                $(this).toggleClass('selectedAttr');
                // remove class selectedAttr from other buttons
                $(this).siblings().removeClass('selectedAttr');

                let attribute_values = [];
                $('.selectedAttr').each(function() {
                    attribute_values.push($(this).data('id'));
                });

                let selected_variant = attributes.find(function(variant) {
                    return variant['attribute_value_ids'].sort().toString() ==
                        attribute_values.sort().toString();
                });


                if (selected_variant != undefined && selected_variant.price) {

                    $("#modal_variant_price").val(removeCurrency(selected_variant.price))
                    $("#modal_variant_sku").val(selected_variant.sku)

                    $('.productPrice').text(selected_variant.currency_price)
                    $('.sku').text(selected_variant.sku)

                }
            })

            $(".buyNow,.cart").on('click', function() {
                // check all attributes are selected
                let selectedAttr = $('.selectedAttr').length;
                if (selectedAttr == {{ $count }}) {
                    // add to cart
                    addToCart()
                } else {
                    toastr.error("{{ __('Please select all attributes') }}")
                }
            })
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

    function addToCart() {
        const variant_sku = $('[name="variant_sku"]').val();
        $('.preloader_area').removeClass('d-none');
        if (variant_sku) {
            $.ajax({
                type: 'get',
                data: $('#modal_add_to_cart_form').serialize(),
                url: "{{ route('website.add.to.cart') }}",
                success: function(response) {
                    toastr.success("{{ __('Item added successfully') }}")

                    $(".wsus__droap_cart_list").html(response.view);
                    $(".cart_total").html(response.subtotal);

                    // check if subTotal has floating value
                    calculate_total('add');

                    $("#staticBackdrop").modal('hide');
                    $('.preloader_area').addClass('d-none');

                    $(".cart_count").html(response.cartCount);
                    const noCart = $('.no-cart')

                    if (noCart) {
                        noCart.remove();
                    }

                    // hide checkout_btn
                    const checkout_btn = $('.checkout_btn')
                    if (checkout_btn) {
                        checkout_btn.removeClass('invisible');
                    }
                },
                error: function(response) {
                    if (response.status == 500) {
                        toastr.error("{{ __('Server error occurred') }}")
                    }

                    if (response.status == 403) {
                        toastr.error(response.responseJSON.message)
                    }
                    $('.preloader_area').addClass('d-none');
                }
            });

        } else {
            toastr.error("{{ __('Please select a variant') }}")
        }
    }
</script>
