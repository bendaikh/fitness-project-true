@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Home Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Home Page')->first()->seo_description ?? '' }}">
@endsection
@section('content')
    {{-- <!--============================
            BANNER 3 START
        =============================--> --}}
    @if (isset($section->slider_visibility) && $section->slider_visibility)
        <section class="wsus__banner_3_slider">
            <div class="row banner_3_slider">
                @foreach ($sliders as $slider)
                    <div class="col-12">
                        <div class="wsus__slider_item" style="background: url({{ asset($slider->image) }});">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__banner_slider_text">
                                            <h1>{{ $slider->title }}</h1>
                                            <a class="common_btn" href="{{ $slider->button_link }}"><i
                                                    class="{{ $slider->button_button_icon }}"></i>
                                                {{ $slider->button_text }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    {{-- <!--============================
            BANNER 3 END
        =============================--> --}}

    @if (isset($section->workout_visibility) && $section->workout_visibility)
        <section class="wsus__program_3 mt_95 xs_mt_75">
            <div class="container">
                <div class="row">
                    @foreach ($workouts as $workout)
                        <div class="col-md-6 col-lg-4 wow fadeInUp">
                            <div class="wsus__program_3_item">
                                <img src="{{ asset($workout->image) }}" alt="program" class="img-fluid w-100">
                                <div class="wsus__program_3_overly">
                                    <div class="text">
                                        <a href="{{ route('website.workout.details', $workout->slug) }}"
                                            class="title">{{ $workout->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- <!--============================
            MACHINE 3 START
        =============================--> --}}
    @if (isset($section->machine_visibility) && $section->machine_visibility)
        <section class="wsus__machine_2 mt_120 xs_mt_100 ">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-5 wow fadeInLeft">
                        <div class="wsus__machine_2_img">
                            <img src="{{ asset($homepage?->about_us_image) }}" alt="machine" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6 wow fadeInRight">
                        <div class="wsus__machine_2_text">
                            <div class="wsus__section_heading_2">
                                <h2>{{ $homepage?->translation?->about_us_title }}</h2>
                            </div>
                            <p>
                                {{ $homepage?->translation?->about_us_description }}
                            </p>
                            <a href="{{ $homepage?->about_us_button_link }}"
                                class="common_btn common_btn_2">{{ $homepage?->translation?->about_us_button_text }}<i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
            MACHINE 3 END
        =============================--> --}}



    {{-- <!--============================
            PROGRAM 4 START
        =============================--> --}}
    @if (isset($section->service_visibility) && $section->service_visibility)
        <section class="wsus__program_4 mt_120 xs_mt_100">
            <div class="row program_4_slider">
                @foreach ($services as $service)
                    <div class="col-xl-3 wow fadeInUp">
                        <div class="wsus__program_4_item">
                            <img src="{{ asset($service->image) }}" alt="program" class="img-fluid w-100">
                            <div class="wsus__program_4_overly">
                                <div class="text">
                                    <a href="{{ route('website.service.details', $service->slug) }}"
                                        class="title">{{ $service->name }}</a>
                                    <p>{{ $service->short_description }}</p>
                                    <a href="{{ route('website.service.details', $service->slug) }}"
                                        class="common_btn white_btn common_btn_2">{{ __('More Details') }} <i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    {{-- <!--============================
            PROGRAM 4 END
        =============================--> --}}


    {{-- <!--============================
        JOIN EVENT START
    =============================--> --}}
    @if (isset($section->video_visibility) && $section->video_visibility)
        <section class="wsus__join_event mt_110 xs_mt_90">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__video_button"
                            style="background: url('{{ asset($homepage?->video_bg_image) }}');">
                            <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                href="{{ $homepage?->video_button_link }}">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        JOIN EVENT END
    =============================--> --}}

    {{-- <!--============================
            PRODUCTS START
        =============================--> --}}

    @if (isShopActive() && isset($section->products_visibility) && $section->products_visibility)
        <section class="wsus__product pt_110 xs_pt_90 pb_120 xs_pb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 m-auto">
                        <div class="wsus__section_heading_3 mb_55">
                            <h2>{{ $content?->translation?->products_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row product_slider">
                    @foreach ($products as $product)
                        <div class="col-xl-3 wow fadeInUp">
                            <div class="wsus__product_item">
                                <div class="img">
                                    <a href="{{ route('website.product-details', $product->slug) }}">
                                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                            class="img-fluid w-100">
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
                                    <a href="{{ route('website.product-details', $product->slug) }}"
                                        class="title">{{ $product->name }}</a>
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
    {{-- <!--============================
            PRODUCTS END
        =============================--> --}}


    {{-- <!--============================
            TESTIMONIAL START
        =============================--> --}}

    @if (isset($section->testimonial_visibility) && $section->testimonial_visibility)
        <section class="wsus__testimonial_3 mb_110 xs_mb_90">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xl-9 wow fadeInUp">
                        <div class="wsus__testimonial_3_slide_text_border">
                            <div class="row slider-for2">
                                @foreach ($testimonials as $testimonial)
                                    <div class="col-xl-12">
                                        <div class="wsus__testimonial_3_slide_text">
                                            <p>{{ $testimonial->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-3 wow fadeInRight">
                        <div class="wsus__testimonial_3_slide_img_area">
                            <div class="row slider-nav2">
                                @foreach ($testimonials as $testimonial)
                                    <div class="col-xl-4">
                                        <div class="wsus__testimonial_3_slide_img">
                                            <div class="img">
                                                <img src="{{ asset($testimonial->image) }}"
                                                    alt="{{ $testimonial->name }}" class="img-fluid">
                                            </div>
                                            <div class="text">
                                                <h4>{{ $testimonial->name }}</h4>
                                                <p>{{ $testimonial->designation }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
            TESTIMONIAL END
        =============================--> --}}


    {{-- <!--============================
            BLOG 3 START
        =============================--> --}}

    @if (isset($section->blog_visibility) && $section->blog_visibility)
        <section class="wsus__blog_3 pb_105 xs_pb_85">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="wsus__section_heading_3 mb_55 wow fadeInUp">
                            <h2>{{ $content?->translation?->blog_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row blog_3_slider">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 wow fadeInUp">
                            <div class="wsus__blog_3_item">
                                <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                                <p><span><img src="{{ asset('website') }}/images/clock_2.png" alt="clock"
                                            class="img-fluid w-100"></span>{{ $blog->created_at->format('d F, Y') }}</p>
                                <div class="wsus__blog_3_overly">
                                    <div class="text">
                                        <a href="{{ route('website.blog-details', $blog->slug) }}"
                                            class="title">{{ $blog->title }}</a>
                                        <a href="{{ route('website.blog-details', $blog->slug) }}"
                                            class="common_btn white_btn common_btn_2">{{ __('Read More') }}<i
                                                class="far fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
            BLOG 3 END
        =============================--> --}}

    @include('components.preloader')
@endsection

@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                const currency = "{{ currency() }}"
                @if (isShopActive())


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
                            }
                        });
                    })
                @endif
            })
        })(jQuery)

        @if (isShopActive())
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
        @endif
        @if (isShopActive())
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
        @endif
    </script>
@endpush
