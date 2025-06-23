@extends('website.layout.master')

@push('css')
    <style>
        .selectedAttr {
            background: var(--colorPrimary);
            color: var(--colorBlack);
        }

        .attr {
            width: 20%;
        }
    </style>
@endpush

@section('title')
    {{ seoSetting()->where('page_name', 'Shop Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Shop Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Shop')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}

    {{-- <!--============================
        PRODUCT PAGE START
    =============================--> --}}
    <section class="wsus__product_page pt_95 xs_pt_75 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <form action="" class="wsus__product__sidebar wsus__product__sidebar__form">

                        <div class="wsus__product_searchbox">
                            <input type="text" placeholder="Product Search" name="search"
                                value="{{ request()->search }}">
                            <button><i class="far fa-search" aria-hidden="true"></i></button>
                        </div>

                        <div class="wsus__product__sidebar_category">
                            <h5>{{ __('Categories') }}</h5>
                            <ul>
                                @foreach ($categories as $key => $cat)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $cat->slug }}"
                                                id="defaultCheck{{ $key }}" name="category[]"
                                                @if (request()->category && in_array($cat->slug, request()->category)) checked @endif>
                                            <label class="form-check-label" for="defaultCheck{{ $key }}">
                                                {{ $cat->name }} ({{ $cat->products->count() }})
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="wsus__product_sidebar_range">
                            <h5>{{ __('Price Range') }}</h5>
                            <div class="range_slider"></div>
                        </div>

                        <div class="wsus__product__sidebar_category wsus__product__sidebar_rating">
                            <h5>{{ __('Rating') }}</h5>
                            <ul>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="all" id="rating9"
                                            name="rating" @if (request()->rating == 'all') checked @endif>
                                        <label class="form-check-label" for="rating9">
                                            <i class="fas fa-star" aria-hidden="true"></i>{{ __('All') }}</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="5" id="rating4"
                                            name="rating" @if (request()->rating == 5) checked @endif>
                                        <label class="form-check-label" for="rating4">
                                            <i class="fas fa-star" aria-hidden="true"></i>{{ __('5 star') }}</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="4" id="rating5"
                                            name="rating" @if (request()->rating == 4) checked @endif>
                                        <label class="form-check-label" for="rating5">
                                            <i class="fas fa-star"
                                                aria-hidden="true"></i>{{ __('4 star or above') }}</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="3" id="rating6"
                                            name="rating" @if (request()->rating == 3) checked @endif>
                                        <label class="form-check-label" for="rating6">
                                            <i class="fas fa-star"
                                                aria-hidden="true"></i>{{ __('3 star or above') }}</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="2" id="rating7"
                                            name="rating" @if (request()->rating == 2) checked @endif>
                                        <label class="form-check-label" for="rating7">
                                            <i class="fas fa-star"
                                                aria-hidden="true"></i>{{ __('2 star or above') }}</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" id="rating8"
                                            name="rating" @if (request()->rating == 1) checked @endif>
                                        <label class="form-check-label" for="rating8">
                                            <i class="fas fa-star"
                                                aria-hidden="true"></i>{{ __('1 star or above') }}</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        @forelse ($products as $product)
                            <x-product :product="$product"></x-product>
                        @empty
                            @include('components.no-data-found', ['message' => __('No Product Found')])
                        @endforelse
                    </div>
                    @if ($products->lastPage() > 1)
                        <div class="row">
                            <div class="col-12 wow fadeInUp vis-animation">
                                <div class="wsus__pagination mt_55">
                                    {{ $products->links('vendor.pagination.frontend') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="wsus__product_modal">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body productModalDetails"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </section>

    {{-- <!--============================
            PRODUCT PAGE END
        =============================--> --}}

    @include('components.preloader')
@endsection


@php
    $minPrice = 0;
    $maxPrice = $priceRange;
@endphp

@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                // Range Slider
                $('.basic').alRangeSlider();
                const options = {
                    range: {
                        min: 0,
                        max: parseInt("{{ $maxPrice }}"),
                        step: 1
                    },
                    initialSelectedValues: {
                        from: "0",
                        to: "{{ cache('pageUtility')?->price_range }}"
                    },
                    allowSmoothTransition: true,
                    grid: {
                        minTicksStep: 1,
                        marksStep: 5
                    },
                    SelectedValues: {
                        from: 30,
                        to: 50
                    },
                    theme: "dark",

                    // Callbacks

                    onFinish: function() {
                        $('.wsus__product__sidebar__form').submit();
                    }
                };


                let sliderInstance = $('.range_slider').alRangeSlider(options);

                sliderInstance.alRangeSlider('update', {
                    values: {
                        from: "{{ request()->from ? request()->from : ($minPrice == $maxPrice ? 0 : $minPrice) }}",
                        to: "{{ request()->to ?? $maxPrice }}"
                    },
                });
                const options2 = {
                    orientation: "vertical"
                };

                const currency = "{{ currency() }}"
                $('.add_to_wishlist').on('click', function() {
                    const id = $(this).data('id')
                    $('.preloader_area').removeClass('d-none');
                    $.ajax({
                        method: "GET",
                        url: "{{ route('website.user.wishlist.store') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.alert == "warning") {
                                toastr.warning(response.message);
                            } else if (response.alert == 'success') {
                                toastr.success(response.message);
                                $(".wishlist_count").text(response.wishlist.length);
                            }
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(error) {
                            console.log(error);
                            $('.preloader_area').addClass('d-none');

                            if (error.status == 401) {
                                toastr.error('{{ __('Please Login First') }}');
                            }
                        }
                    });
                })


                $("[name='category[]']").on('change', function() {
                    $('.wsus__product__sidebar__form').submit()
                })

                $('[name="rating"]').on('change', function() {
                    $('.wsus__product__sidebar__form').submit()
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

            // check is total has floating value
            if (total % 1 == 0) {
                total += '.00'
            }
            $(".modal_grand_total").html(total)
            $("#modal_price").val(total);
        }

        function calculate_total(type) {
            let sub_total = 0;

            $(".item_price").each(function() {
                let current_val = $(this).text();
                current_val = current_val.split("{{ currency() }}")[1];
                sub_total += parseFloat(current_val);
            });
        }

        function singleAddToCart(id) {
            $('.preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                data: {
                    product_id: id,
                    type: 'single'
                },
                url: "{{ route('website.add.to.cart') }}",
                success: function(response) {
                    toastr.success("{{ __('Item added successfully') }}")

                    $(".wsus__droap_cart_list").html(response.view);
                    $(".cart_total").html(response.subtotal);
                    $(".cart_count").html(response.cartCount);

                    $('.preloader_area').addClass('d-none');

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
        }

        function viewCartDetails(id) {
            $('.preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                url: "{{ route('website.product-modal', '') }}" + "/" + id,
                success: function(response) {
                    $(".productModalDetails").html(response)
                    $("#staticBackdrop").modal('show');
                    $('.preloader_area').addClass('d-none');
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                    $('.preloader_area').addClass('d-none');
                }
            });
        }
    </script>
@endpush
