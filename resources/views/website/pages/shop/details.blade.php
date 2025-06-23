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
    {{ html_decode($product->name) }} || {{ seoSetting()->where('page_name', 'Shop Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Shop Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Product Details')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        PRODUCT DETAILS START
    =============================--> --}}
    <section class="wsus__product_details mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 wow fadeInLeft">
                    <div class="row slider-forFive">

                        @foreach ($product->images_url as $url)
                            <div class="col-xl-12">
                                <div class="wsus__product_details_slide_show_img">
                                    <img src="{{ $url }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                        @endforeach

                        @if (count($product->images_url) == 0)
                            <div class="col-xl-12">
                                <div class="wsus__product_details_slide_show_img">
                                    <img src="{{ asset($product->image_url) }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="wsus__product_details_slider">
                        <div class="row slider-navFive">
                            @foreach ($product->images_url as $url)
                                <div class="col-xl-2">
                                    <div class="wsus__product_details_slider_img">
                                        <img src="{{ $url }}" alt="product" class="img-fluid w-100">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 wow fadeInRight">
                    <form id="modal_add_to_cart_form">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="price" value="0" id="modal_price">
                        <input type="hidden" name="variant_price" value="0" id="modal_variant_price">
                        <input type="hidden" name="variant_sku" value="0" id="modal_variant_sku">
                        <div class="wsus__product_summary">
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
                            <p>{{ $product->short_description }}</p>
                            @php
                                $count = 0;
                            @endphp
                            @if ($product->hasVariant)
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
                            @endif
                            <div class="wsus__product_add_cart">
                                <div class="wsus__product_quantity">
                                    <button class="minus" type="button"><i class="far fa-minus"></i></button>
                                    <input type="text" placeholder="01" value="1" class="modal_product_qty"
                                        name="qty">
                                    <button class="plus" type="button"><i class="far fa-plus"></i></button>
                                </div>
                                <div class="wsus__buy_cart_button">
                                    <a href="javascript:;" class="cart {{ $product->has_variant ? 'addCart' : '' }}"
                                        @if (!$product->has_variant) onclick="singleAddToCart()" @endif><img
                                            src="{{ asset('website') }}/images/Shoping_cart.png" alt="cart"
                                            class="img-fluid w-100"></a>
                                    <a href="javascript:;"
                                        class="common_btn common_btn_2 buy_redirect {{ $product->has_variant ? 'buyNow' : '' }}"
                                        @if (!$product->has_variant) onclick="singleAddToCart()" @endif>{{ __('Buy Now') }}</a>
                                </div>
                            </div>
                            <ul class="wishlist d-flex flex-wrap">
                                <li><a href="javascript:;" class="add_to_wishlist"><span><i
                                                class="fal fa-heart"></i></span>{{ __('Add to WishList') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="share">
                                        <span><i class="fal fa-share-alt"></i></span>{{ __('Share') }}
                                    </a>
                                    <div class="social d-none">
                                        <a href="{{ $shareLinks->facebook }}"><i class="fab fa-facebook-f"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ $shareLinks->twitter }}"><i class="fab fa-twitter"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ $shareLinks->linkedin }}"><i class="fab fa-linkedin-in"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ $shareLinks->pinterest }}"><i class="fab fa-pinterest"></i></a>
                                    </div>
                                </li>
                            </ul>
                            @php
                                $tags = $product->tags ? json_decode($product->tags) : [];
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
                                @if (count($tags) > 0)
                                    <li>{{ __('Tags') }}:<span>
                                            @foreach ($tags as $tag)
                                                {{ $tag->value }} @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </span></li>
                                @endif
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wsus__timetable_menu wsus__product_details_menu text-center mt_115 xs_mt_95 wow fadeInUp">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-homeTwo-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-homeTwo" type="button" role="tab"
                                    aria-controls="pills-homeTwo" aria-selected="true">{{ __('Description') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profileTwo-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profileTwo" type="button" role="tab"
                                    aria-controls="pills-profileTwo"
                                    aria-selected="false">{{ __('Additional Information') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contactTwo-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contactTwo" type="button" role="tab"
                                    aria-controls="pills-contactTwo" aria-selected="false">{{ __('Reviews') }}</button>
                            </li>
                        </ul>
                    </div>
                    <div class="wsus__product_details_menu_contant wow fadeInUp">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-homeTwo" role="tabpanel"
                                aria-labelledby="pills-homeTwo-tab" tabindex="0">
                                <div class="wsus__product_description wow fadeInUp">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profileTwo" role="tabpanel"
                                aria-labelledby="pills-profileTwo-tab" tabindex="0">
                                <div class="wsus__product_additional_info wsus__product_description ">
                                    <div class="row align-items-center justify-content-between">
                                        {!! $product->additional_information !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contactTwo" role="tabpanel"
                                aria-labelledby="pills-contactTwo-tab" tabindex="0">
                                <div class="wsus__product_details_review">
                                    <div class="row justify-content-center">
                                        @foreach ($reviews as $review)
                                            <div class="col-xl-8 wow fadeInUp">
                                                <div class="wsus__blog_single_comment wsus__product_review">
                                                    <div class="img">
                                                        <img src="{{ $review->user->imageUrl }}" alt="comment"
                                                            class="img-fluid w-100">
                                                    </div>
                                                    <div class="text">
                                                        <h5>{{ $review?->user?->name }}
                                                            <span class="review_icon">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->rating)
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="fal fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </span>

                                                        </h5>
                                                        <span class="date">{{ $review->created_at->format('M d, Y') }}
                                                            at {{ $review->created_at->format('H:i A') }}</span>
                                                        <p>{{ $review->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if ($reviews->hasMorePages())
                                            <a href="{{ $review->nextPageUrl() }}"
                                                class="load_more">{{ __('Load More') }}</a>
                                        @endif
                                    </div>
                                    @if ($reviews->isEmpty())
                                        <div class="row">

                                            <div class="col-6 mx-auto h-100 w-100">
                                                <div class="wsus__no_data ">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <h2 class="my-auto">{{ __('No Reviews Found.') }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 wow fadeInUp">
                                        <form method="POST" action="{{ route('website.post.review') }}"
                                            class="wsus__blog_details_form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="rating" value="5" id="product_rating">
                                            <h4>{{ __('Leave a Review') }}</h4>
                                            <p class="review_icon">
                                                <span>{{ __('Select Your Rating') }}</span>
                                                <i data-rating="1" class="fas fa-star product_rat"
                                                    onclick="productReview(1)"></i>
                                                <i data-rating="2" class="fas fa-star product_rat"
                                                    onclick="productReview(2)"></i>
                                                <i data-rating="3" class="fas fa-star product_rat"
                                                    onclick="productReview(3)"></i>
                                                <i data-rating="4" class="fas fa-star product_rat"
                                                    onclick="productReview(4)"></i>
                                                <i data-rating="5" class="fas fa-star product_rat"
                                                    onclick="productReview(5)"></i>
                                            </p>
                                            <div class="col-xl-12">
                                                <div class="wsus__blog_details_form_input">
                                                    <textarea rows="4" placeholder="{{ __('Write Your Review Here') }}..." name="comment"></textarea>
                                                </div>
                                            </div>
                                            @if ($setting->recaptcha_status == 'active')
                                                <div class="col-xl-12 my-2">
                                                    <div class="g-recaptcha"
                                                        data-sitekey="{{ $setting->recaptcha_site_key }}">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-xl-12">
                                                <div class="wsus__blog_details_form_button">
                                                    <button
                                                        class="btn common_btn common_btn_2 {{ $canGiveReview ? 'submit-review' : '' }}"
                                                        @if (!$canGiveReview) disabled @endif
                                                        type="submit">{{ __('Submit Review') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        PRODUCT DETAILS END
    =============================--> --}}


    {{-- <!--================================
        RELETED PRODUCT START
    =================================--> --}}
    @if ($relatedProduct->count() > 0)
        <section class="wsus__releted_product mb_115 xs_mb_95">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="wsus__section_heading_3 mb_55">
                            <h2>{{ __('Related Products') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row releted_product">
                    @foreach ($relatedProduct as $related)
                        <x-product :product="$related"></x-product>
                    @endforeach
                </div>
            </div>

            <!-- Modal -->
            <div class="wsus__product_modal">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body productModalDetails">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

        </section>
    @endif
    {{-- <!--================================
        RELETED PRODUCT END
    =================================--> --}}

    @include('components.preloader')
@endsection



@push('scripts')
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

                        $("#modal_variant_price").val(removeCurrency(selected_variant.currency_price))
                        $("#modal_variant_sku").val(selected_variant.sku)

                        $('.productPrice').text(selected_variant.currency_price)
                        $('.sku').text(selected_variant.sku)
                    }
                })

                $(".buyNow,.addCart").on('click', function() {
                    // check all attributes are selected
                    let selectedAttr = $('.selectedAttr').length;
                    if (selectedAttr == {{ $count }}) {
                        // add to cart
                        addToCart()
                    } else {
                        toastr.error("{{ __('Please select all attributes') }}")
                    }
                })
                $('.buy_redirect').on('click', function() {
                    window.location.href = "{{ route('website.checkout') }}"
                })

                $(".submit-review").on('click', function() {
                    let rating = $("#product_rating").val();
                    let review = $(".wsus__blog_details_form textarea").val();
                    if (rating && review) {
                        $(".wsus__blog_details_form").submit();
                    } else {
                        toastr.error("{{ __('Please select rating and write review') }}")
                    }
                })

                const currency = "{{ currency() }}"
                $('.add_to_wishlist').on('click', function() {
                    const login = "{{ auth()->check() }}"
                    if (!login) {
                        toastr.warning("{{ __('Please login first') }}")
                        return
                    }
                    $('.preloader_area').removeClass('d-none');
                    $.ajax({
                        method: "GET",
                        url: "{{ route('website.user.wishlist.store') }}",
                        data: {
                            id: "{{ $product->id }}",
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
                        }
                    });
                })

                $('.share').on('click', function() {
                    $('.social').toggleClass('d-none');
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
                        $(".cart_count").text(response.cart_count);
                        $("#staticBackdrop").modal('hide');
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
                    },
                    complete: function() {
                        $('.preloader_area').addClass('d-none');
                    }
                });

            } else {
                toastr.error("{{ __('Please select a size') }}")
            }
        }

        function singleAddToCart() {
            $('.preloader_area').removeClass('d-none');
            const qty = $('[name="qty"]').val();
            $.ajax({
                type: 'get',
                data: {
                    product_id: "{{ $product->id }}",
                    qty,
                    type: 'single'
                },
                url: "{{ route('website.add.to.cart') }}",
                success: function(response) {
                    toastr.success("{{ __('Item added successfully') }}")

                    $(".wsus__droap_cart_list").html(response.view);
                    $(".cart_total").html(response.subtotal);
                    $(".cart_count").html(response.cartCount);
                    // check if subTotal has floating value
                    calculate_total('add');

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
                },
                complete: function() {
                    $('.preloader_area').addClass('d-none');
                }
            });
        }

        function calculate_total(type) {
            let sub_total = 0;

            $(".item_price").each(function() {
                let current_val = $(this).text();
                current_val = current_val.split("{{ currency() }}")[1];
                sub_total += parseFloat(current_val);
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

        function productReview(rating) {
            $(".product_rat").each(function() {
                var product_rat = $(this).data('rating')
                if (product_rat > rating) {
                    $(this).removeClass('fas fa-star').addClass('fal fa-star');
                } else {
                    $(this).removeClass('fal fa-star').addClass('fas fa-star');
                }
            })
            $("#product_rating").val(rating);
        }
    </script>
@endpush
