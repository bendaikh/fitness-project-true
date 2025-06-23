@extends('website.layout.master')
@section('title')
    {{ seoSetting()->where('page_name', 'Cart Page')->first()->seo_title ?? '' }}
@endsection
@section('content')
    <!--============================
                                                                                    BREADCRUMBS START
                                                                                =============================-->
    @include('components.website.breadcrum', ['title' => __('Cart Details')])
    <!--============================
                                                        BREADCRUMBS END
                                                    =============================-->


    <!--============================
                                                        CART START
                                                    =============================-->
    <section class="wsus__cart mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            @if ($cart_contents == null || count($cart_contents) == 0)
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                        <h3 class="text-center cart_empty_text">{{ __('Your shopping cart is empty!') }}</h3>
                    </div>
                </div>
                @include('components.shipping-button')
            @else
                <div class="row justify-content-center">
                    <div class="col-xl-10 wow fadeInUp">
                        <div class="wsus__cart_list">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pro_img">{{ __('Item') }}</th>

                                            <th class="pro_name">{{ __('Name') }}</th>

                                            <th class="pro_select">{{ __('Quantity') }}</th>

                                            <th class="pro_tk">{{ __('Price') }}</th>
                                            <th class="pro_icon">
                                                <a class="clear_all" href="javascript:;">{{ __('clear all') }}</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                            $tax = 0;
                                        @endphp
                                        @foreach ($cart_contents as $index => $cart_content)
                                            @php
                                                $subtotal += $cart_content['sub_total'];
                                                $tax += ($cart_content['sub_total'] * $cart_content['tax']) / 100;
                                            @endphp
                                            <tr class="main-cart-item-{{ $cart_content['rowid'] }}"
                                                data-rowid="{{ $cart_content['rowid'] }}">
                                                <td class="pro_img">
                                                    <img src="{{ asset('/') . $cart_content['image'] }}" alt="product"
                                                        class="img-fluid w-100">
                                                </td>

                                                <td class="pro_name">
                                                    <a
                                                        href="{{ route('website.product-details', $cart_content['slug']) }}">{{ $cart_content['name'] }}</a>
                                                </td>

                                                <td class="pro_select">
                                                    <div class="quentity_btn">
                                                        <button class="btn btn-danger decrement_product"><i
                                                                class="fal fa-minus"></i></button>
                                                        <input type="number" placeholder="1"
                                                            value="{{ $cart_content['qty'] }}" name="quantity"
                                                            class="no-spinners">
                                                        <button class="btn btn-success increament_product"><i
                                                                class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>

                                                <td class="pro_tk">
                                                    <h6>{{ currency($cart_content['price']) }}</h6>
                                                </td>

                                                <td class="pro_icon" data-remove-rowid="{{ $cart_content['rowid'] }}">
                                                    <a class="remove_item" href="javascript:;"><i
                                                            class="fal fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="wsus__cart_list_bottom">
                            <div class="row justify-content-between">
                                <div class="col-md-6 col-xl-7 wow fadeInUp">
                                    <div class="wsus__cart_coupon">
                                        <h4>{{ __('Apply Coupon') }}</h4>
                                        <form id="coupon_form" action="javascript:;">
                                            <input type="text" placeholder="{{ __('Code Here') }}" name="coupon">
                                            <input type="hidden" name="author_id" value="0">
                                            <input type="hidden" name="amount" value="0">
                                            <input type="hidden" name="tax_amount" value="{{ $tax }}">
                                            <button type="submit"
                                                class="common_btn common_btn_2">{{ __('Apply') }}</button>
                                        </form>
                                        <p class="ms-1 mt-1 coupon_section {{ session('coupon_code') ? '' : 'd-none' }}">
                                            <span>{{ __('Applied') }}</span>
                                            <span class="color-black coupon_name">{{ session('coupon_code') }}</span> <span
                                                class="ms-3 remove_coupon" title="Remove Coupon"><i
                                                    class="fal fa-times"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-5 wow fadeInUp">
                                    <div class="wsus__cart_list_pricing">
                                        @include('components.website.cart.subtotal', [
                                            'subtotal' => $subtotal,
                                            'tax' => $tax,
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10 wow fadeInUp">
                        <ul class="wsus__cart_list_bottom_btn">
                            <li>
                                <a href="{{ route('website.shop') }}"
                                    class="common_btn common_btn_2 cont_shop">{{ __('Continue To Shopping') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('website.checkout') }}"
                                    class="common_btn common_btn_2">{{ __('Checkout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--============================
                                                                                                        CART END
                                                                                                    =============================-->
    @include('components.preloader')
@endsection


@push('scripts')
    <script>
        "use strict";
        $(document).ready(function() {
            $(".increament_product").on("click", function() {

                const quantity = $(this).siblings("[name='quantity']")

                let val = quantity.val();
                val = parseInt(val) + 1
                quantity.val(val)


                // get the rowid
                let rowId = $(this).parents('tr').data('rowid');

                // update the quantity and subtotal
                update_item_qty(rowId, val);
            })

            $('[name="quantity"]').on("change", function() {

                // check if not string
                if (isNaN($(this).val())) return

                // check if less than 1
                if ($(this).val() <= 0) return

                // get the rowid
                let rowId = $(this).parents('tr').data('rowid');

                // update the quantity and subtotal
                update_item_qty(rowId, $(this).val());
            })

            $(".decrement_product").on("click", function() {

                const quantity = $(this).siblings("[name='quantity']")

                let val = parseInt(quantity.val());

                if (val == 1) return;

                val = val - 1
                quantity.val(val)

                // get the rowid
                let rowId = $(this).parents('tr').data('rowid');

                // update the quantity and subtotal
                update_item_qty(rowId, val);
            })

            $(".remove_item").on("click", function() {
                $('.preloader_area').removeClass('d-none')
                const parentTr = $(this).parents('tr')
                const rowId = parentTr.data('rowid')
                parentTr.remove();

                $.ajax({
                    type: 'get',
                    url: "{{ route('website.remove.from.cart', '') }}" + "/" + rowId,
                    success: function(response) {
                        toastr.success(response.message);
                        $('.wsus__cart_list_pricing').html(response.totalView)
                        $(".wsus__droap_cart_list").html(response.view);
                        $(".cart_total").html(response.subtotal);
                        $('.preloader_area').addClass('d-none');
                        $('.cart_count').text(response.cartCount)
                        resetCoupon();
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

            })

            $(".clear_all").on("click", function() {

                let empty_cart = `<div class="row">
                        <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                            <h3 class="text-center cart_empty_text">{{ __('Your shopping cart is empty!') }}</h3>
                        </div>
                    </div>`;

                const shoppingButton = `@include('components.shipping-button')`
                // remove all child of .container

                const inner = empty_cart + shoppingButton
                $(".wsus__cart > .container").html(inner);

                const navCart = `@include('components.website.cart.no-item-cart')`;
                $(navCart).insertAfter('.wsus__droap_cart > h5')
                $('.wsus__droap_cart_list').html('')
                $('.wsus__droap_total_price').html('')
                $.ajax({
                    type: 'get',
                    url: "{{ route('website.clear.cart') }}",
                    success: function(response) {
                        toastr.success(response.message);
                        resetCoupon()
                        $('.cart_count').text(0)
                    },
                    error: function(response) {
                        if (response.status == 500) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                        if (response.status == 403) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                    }
                });
            })
            $("#coupon_form").on("submit", function(e) {
                e.preventDefault();

                const coupon = $('[name="coupon"]').val();
                const subTotal = $('[name="subTotal"]')
                const tax = $('[name="tax"]')
                if (coupon === '') {
                    toastr.error('{{ __('Please enter a coupon code') }}');
                    return;
                }

                // tax_amount
                $('[name="tax_amount"]').val(tax.val());
                $('[name="amount"]').val(subTotal.val());
                const formData = $('#coupon_form').serialize();
                $.ajax({
                    type: 'get',
                    data: formData,
                    url: "{{ route('website.apply.coupon') }}",
                    beforeSend: function() {
                        $("#coupon_form button[type='submit']").html(
                            '<i class="fas fa-spinner fa-spin"></i> {{ __('Applying') }}'
                        )
                        $("#coupon_form button").attr("disabled", true);
                    },
                    success: function(response) {
                        toastr.success(response.message)

                        $(".coupon_section").removeClass("d-none");
                        $('.coupon_name').text(response.coupon_code)
                        $('.wsus__cart_list_pricing').html(response.totalView)
                        $("#coupon_form").trigger("reset");
                        $("#coupon_form button[type='submit']").html(
                            "{{ __('Applied') }}")
                        $("#coupon_form button").attr("disabled", false);
                    },
                    error: function(response) {
                        if (response.status == 422) {
                            if (response.responseJSON.errors.coupon) toastr.error(
                                response.responseJSON.errors.coupon[0])
                        }

                        if (response.status == 500) {
                            toastr.error("{{ __('Server error occurred') }}")
                            $("#coupon_form button[type='submit']").html(
                                "{{ __('Apply') }}")
                            $("#coupon_form button").attr("disabled", false);
                        }

                        if (response.status == 403) {
                            toastr.error(response.responseJSON.message)
                            $("#coupon_form button[type='submit']").html(
                                "{{ __('Apply') }}")
                            $("#coupon_form button").attr("disabled", false);
                        }

                        $("#coupon_form button[type='submit']").html(
                            "{{ __('Apply') }}")
                        $("#coupon_form button").attr("disabled", false);
                    }
                });
            })

            $('.remove_coupon').on('click', function() {
                const button = $(this)
                button.html('<i class="fas fa-spinner fa-spin"></i>')
                const subTotal = $('[name="subTotal"]')
                const tax = $('[name="tax"]');
                $.ajax({
                    type: 'get',
                    data: {
                        amount: subTotal.val(),
                        tax: tax.val()
                    },
                    url: "{{ route('website.remove.coupon') }}",
                    success: function(response) {
                        toastr.success(response.message)
                        $(".coupon_section").addClass("d-none");
                        $('.wsus__cart_list_pricing').html(response.totalView)
                        resetCoupon()
                    },
                    error: function(response) {
                        if (response.status == 500) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                        if (response.status == 403) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                    }
                });

            })
        });

        function update_item_qty(rowid, quantity) {

            $('.preloader_area').removeClass('d-none')
            // calculate_total();
            $.ajax({
                type: 'get',
                data: {
                    rowid,
                    quantity
                },
                url: "{{ route('website.update.cart') }}",
                success: function(response) {
                    $('.wsus__cart_list_pricing').html(response.totalView)
                    $(".wsus__droap_cart_list").html(response.cartView);
                    $(".cart_total").html(response.subtotal);
                    $('.preloader_area').addClass('d-none')
                    resetCoupon()
                },
                error: function(response) {
                    if (response.status == 500) {
                        toastr.error("{{ __('Server error occurred') }}")
                    }

                    if (response.status == 403) {
                        toastr.error(response.responseJSON.message)
                    }
                    $('.preloader_area').addClass('d-none')
                }
            });
        }

        function calculate_total() {
            let sub_total = 0;
            let coupon_price = $("#couon_price").val();
            let couon_offer_type = $("#couon_offer_type").val();


            let total_item = 0;
            $(".product_total").each(function() {
                let current_val = $(this).val();
                sub_total = parseInt(sub_total) + parseInt(current_val);
                total_item = parseInt(total_item) + parseInt(1);
            });


            let apply_coupon_price = 0.00;
            if (couon_offer_type == 1) {
                let percentage = parseInt(coupon_price) / parseInt(100)
                apply_coupon_price = (parseFloat(percentage) * parseFloat(sub_total));
            } else if (couon_offer_type == 2) {
                apply_coupon_price = coupon_price;
            }

            let grand_total = parseInt(sub_total) - parseInt(apply_coupon_price);
            let total_html =
                `<h6>{{ __('total cart') }}</h6>
                            <p>{{ __('subtotal') }}: <span>{{ currency_icon() }}${sub_total}</span></p>
                            <p>{{ __('delivery') }} (+): <span>{{ currency_icon() }}0.00</span></p>
                            <p>{{ __('discount') }} (-): <span>{{ currency_icon() }}${apply_coupon_price}</span></p>
                            <p class="total"><span>{{ __('Total') }}:</span> <span>{{ currency_icon() }}${grand_total}</span></p>`;
            $(".grand_total").html(total_html);
            $(".mini_sub_total").html(`{{ currency_icon() }}${sub_total}`);

            let empty_cart = `<div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                        <h3 class="text-center cart_empty_text">{{ __('Your shopping cart is empty!') }}</h3>
                    </div>
                </div>`;

            let mini_empty_cart = `<div class="wsus__menu_cart_header">
                <h5>{{ __('Your cart is empty') }}</h5>
                <span class="close_cart"><i class="fal fa-times"></i></span>
            </div>
            `;

            if (total_item == 0) {
                $(".cart-main-body").html(empty_cart)
                $(".wsus__menu_cart_boody").html(mini_empty_cart)
            }

            $(".topbar_cart_qty").html(total_item);

        }


        function resetCoupon() {

            $("#coupon_form").trigger("reset");
            $(".coupon_section").addClass("d-none");
            $('#coupon_form button[type="submit"]').html(
                "{{ __('Apply') }}");
        }
    </script>
@endpush
