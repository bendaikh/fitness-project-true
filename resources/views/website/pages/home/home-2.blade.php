@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Home Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Home Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
            BANNER 2 START
        =============================--> --}}
    @if (isset($section->slider_visibility) && $section->slider_visibility)
        <section class="wsus__banner_2_slider">
            <div class="row banner_2_slider">
                @foreach ($sliders as $slider)
                    <div class="col-12">
                        <div class="wsus__banner_2_slider_item" style="background: url({{ asset($slider->image) }});">
                            <div class="wsus_banner_2_overly">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-9">
                                            <div class="wsus__banner_2_slider_text">
                                                <h1>{{ $slider->title }}</h1>
                                                <a class="common_btn " href="{{ $slider->button_link }}"><i
                                                        class="{{ $slider->button_icon }}"></i>
                                                    {{ $slider->button_text }}</a>
                                            </div>
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
            BANNER 2 END
        =============================--> --}}


    {{-- <!--============================
            PROGRAME 2 START
        =============================--> --}}

    @if (isset($section->workout_visibility) && $section->workout_visibility)
        <section class="wsus__programe_2 pt_110 xs_pt_90 pb_105 xs_pb_85">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="wsus__section_heading_2 mb_50">
                            <h2>{{ strip_tags($content?->translation?->program_title) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__programe_2_content">
                <div class="row programe_2_slider justify-content-between">
                    @foreach ($workouts as $workout)
                        <div class="col-xl-2 wow fadeInUp">
                            <div class="wsus__programe_2_item">
                                <a href="{{ route('website.workout.details', $workout->slug) }}" class="img">
                                    <img src="{{ asset($workout->image) }}" alt="{{ $workout->name }}"
                                        class="img-fluid w-100">
                                    <ul>
                                        <li>{{ $workout->training_days }} {{ __('Day') }}</li>
                                        <li>{{ $workout->availableSeats }} {{ __('Seats') }}</li>
                                    </ul>
                                </a>
                                <a href="{{ route('website.workout.details', $workout->slug) }}"
                                    class="title">{{ $workout->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
            PROGRAME 2 END
        =============================--> --}}


    {{-- <!--============================
            CALL TO ACTION END
        =============================--> --}}
    @if (isset($section->call_to_action_visibility) && $section->call_to_action_visibility)
        <section class="wsus__call_to_action pt_95 xs_pt_75">
            <div class="container">
                <div class="row">
                    @foreach ($counters as $counter)
                        <div class="col-sm-6 col-xl-3 wow fadeInUp">
                            <div class="wsus__call_to_action_item">
                                <span>
                                    <img src="{{ asset($counter->icon) }}" alt="CTA" class="img-fluid">
                                </span>
                                <p>{{ $counter->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
            CALL TO ACTION END
        =============================--> --}}

    {{-- <!--============================
            MACHINE 2 START
        =============================--> --}}
    @if (isset($section->machine_visibility) && $section->machine_visibility)
        <section class="wsus__machine_2 pt_120 xs_pt_100 pb_120 xs_pb_100">
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
                                {!! $homepage?->translation?->about_us_description !!}
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
            MACHINE 2 END
        =============================--> --}}


    {{-- <!--============================
            PRICING 2 START=============================-->
        =============================--> --}}
    @if (isset($section->pricing_visibility) && $section->pricing_visibility)
        <section class="wsus__pricing_2">
            <div class="wsus__pricing_2_overly pt_120 xs_pt_100 pb_120 xs_pb_100">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-5 wow fadeInLeft">
                            <div class="wsus__pricing_2_text">
                                <div class="wsus__section_heading_2">
                                    <h2>{{ $homepage?->translation?->pricing_title }}</h2>
                                </div>
                                {!! $homepage?->translation?->pricing_description !!}
                            </div>
                        </div>
                        <div class="col-xl-6 wow fadeInRight">
                            <div class="row">
                                @foreach ($plans as $plan)
                                    <div class="col-md-6 col-xl-6">
                                        <div
                                            class="wsus__pricing_2_item {{ $loop->first ? 'wsus__pricing_2_item_1' : '' }}">
                                            <h3>{{ $plan->plan_name }}</h3>
                                            <ul>
                                                @foreach ($plan->options as $option)
                                                    <li>{{ $option->name }}</li>
                                                @endforeach
                                            </ul>
                                            <div class="wsus__pricing_2_btn">
                                                <a href="javascript:;" class="common_btn white_btn common_btn_2 join-now"
                                                    data-plan="monthly" data-plan_id="{{ $plan->id }}">
                                                    {{ __('Join Now') }} <i class="far fa-long-arrow-right"></i></a>
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
            PRICING 2 END
        =============================--> --}}


    {{-- <!--============================
            PRODUCTS START
        =============================--> --}}
    @if (isShopActive() && isset($section->products_visibility) && $section->products_visibility)
        <section class="wsus__product pt_110 xs_pt_90 pb_120 xs_pb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 m-auto wow fadeInUp">
                        <div class="wsus__section_heading_2 mb_50">
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
            TESTIMONIAL 2 START
        =============================--> --}}
    @if (isset($section->testimonial_visibility) && $section->testimonial_visibility)
        <section class="wsus__testimonial_2 pt_110 xs_pt_90 pb_115 xs_pb_95">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInLeft">
                        <div class="wsus__section_heading_2 mb_50">
                            <h2>{{ $content?->translation?->testimonial_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__testimonial_2_area">
                <div class="row testimonial_2_slider">
                    @foreach ($testimonials as $testimonial)
                        <div class="col-xl-4 wow fadeInRight">
                            <div class="wsus__testimonial_2_item">
                                <div class="text">
                                    <p>{{ $testimonial->comment }}</p>
                                </div>
                                <div class="wsus__testimonial_2_reviewer">
                                    <div class="img wsus__slider_small_img">
                                        <img src="{{ asset($testimonial->image) }}" alt="review"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="name">
                                        <h4 class="title">{{ $testimonial->name }}</h4>
                                        <p>{{ $testimonial->designation }}</p>
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
            TESTIMONIAL 2 END
        =============================--> --}}


    {{-- <!--============================
            BLOG 2 START
        =============================--> --}}
    @if (isset($section->blog_visibility) && $section->blog_visibility)
        <section class="wsus__blog_2 pt_110 xs_pt_90 pb_120 xs_pb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 m-auto">
                        <div class="wsus__section_heading_2 mb_25">
                            <h2>{{ $content?->translation?->blog_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div
                            class="wow {{ $loop->first ? 'col-xl-6 col-lg-4 fadeInLeft' : 'col-md-6 col-lg-4 col-xl-3 fadeInRight' }}">
                            <div class="wsus__blog_2_item">
                                <a href="{{ route('website.blog-details', $blog->slug) }}" class="wsus__blog_2_img">
                                    <img src="{{ asset($blog->image) }}" alt="img" class="img-fluid w-100">
                                </a>
                                <div class="wsus__blog_2_text">
                                    <ul class="d-flex flex-wrap">
                                        <li><span><img src="{{ asset('website') }}/images/clock.png" alt="icon"
                                                    class="img-fluid w-100"></span>{{ $blog->created_at->format('d F, Y') }}
                                        </li>
                                        <li><span><img src="{{ asset('website') }}/images/massage.png" alt="icon"
                                                    class="img-fluid w-100"></span>{{ $blog->comments->count() }}
                                            {{ __('Comment') }}</li>
                                    </ul>
                                    <a href="{{ route('website.blog-details', $blog->slug) }}"
                                        class="title">{{ $blog->title }}</a>
                                    <a href="{{ route('website.blog-details', $blog->slug) }}"
                                        class="common_btn white_btn common_btn_2">{{ __('Read More') }}<i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        BLOG 2 END
    =============================--> --}}
    @include('components.preloader')
@endsection




@push('scripts')
    <script>
        "use strict";
        $(document).ready(function() {
            const currency = "{{ currency() }}"
            @if (isShopActive())
                $('.add_to_wishlist').on('click', function() {
                    const id = $(this).data('id')
                    const auth = "{{ auth()->user() }}"
                    if (!auth) {
                        toastr.error('{{ __('Please Login First') }}');
                        window.location.href = "{{ route('login') }}";
                        return;
                    }
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
                            if (error.status == 401) {
                                toastr.error('{{ __('Please Login First') }}');
                            }
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                })
            @endif
            $('.join-now').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var plan = $(this).data('plan');
                var plan_id = $(this).data('plan_id');
                var type = 'plan';

                const route = "{{ route('website.payment') }}?plan=" + plan + "&plan_id=" + plan_id +
                    "&type=" + type;


                // check if user is logged in
                const user = "{{ auth()->user() }}";


                if (user == '') {
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                window.location.href = route;

            });

            const hasSlider = "{{ isset($section->slider_visibility) && $section->slider_visibility }}";

            if (!hasSlider) {
                $('.main_menu_2,.wsus__header_2').css('background', 'var(--colorBlack)')
            }
        })
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
