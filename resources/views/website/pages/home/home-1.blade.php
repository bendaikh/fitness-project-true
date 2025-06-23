@extends('website.layout.master')

@push('css')
    <style>
        .wsus__machine_bg::before {
            background: url('{{ asset($homepage?->about_us_bg_shape_1) }}') center center / cover no-repeat;
        }

        .wsus__machine_bg::after {
            background: url('{{ asset($homepage?->about_us_bg_shape_2) }}') center center / cover no-repeat;
        }
    </style>
@endpush

@section('title')
    {{ seoSetting()->where('page_name', 'Home Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Home Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BANNER START
    =============================--> --}}
    @if (isset($section->slider_visibility) && $section->slider_visibility)
        <section class="wsus__banner_slider wow fadeInUp">
            <div class="row banner_slider">
                @foreach ($sliders as $slider)
                    <div class="col-12">
                        <div class="wsus__slider_item" style="background: url({{ asset($slider->image) }})">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xxl-8 col-lg-10">
                                        <div class="wsus__banner_slider_text">
                                            <h5>{{ $slider->subtitle_1 }}</h5>
                                            <h1>
                                                {{ $slider->title }}
                                            </h1>
                                            <p>
                                                {{ $slider->subtitle_2 }}
                                            </p>
                                            <a class="common_btn white_btn" href="{{ $slider->button_link }}"><i
                                                    class="{{ $slider->button_icon }}"></i>
                                                {{ $slider->button_text }}
                                            </a>
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
        BANNER END
    =============================--> --}}


    {{-- <!--============================
        PROGRAM START
    =============================--> --}}
    @if (isset($section->workout_visibility) && $section->workout_visibility)
        <section class="wsus__program mt_110 xs_mt_90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 wow fadeInUp">
                        <div class="wsus__section_headeing heading_left mb_50">
                            <h2>{{ $content?->translation?->program_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wsus__program_area wow fadeInUp">
                <div class="row program_slider">
                    @foreach ($workouts as $workout)
                        <div class="col-xl-4">
                            <div
                                class="wsus__program_item {{ $workouts->count() < 4 && $loop->last ? 'border-end-0' : '' }}">
                                <img src="{{ asset($workout->image) }}" alt="{{ $workout->name }}" class="img-fluid">
                                <div class="text">
                                    <a href="{{ route('website.workout.details', $workout->slug) }}"
                                        class="title">{{ $workout->name }}</a>
                                    <a href="{{ route('website.workout.details', $workout->slug) }}"
                                        class="arrow_button"><i class="far fa-long-arrow-right"></i></a>
                                    <ul>
                                        <li>{{ $workout->training_days }} {{ __('Day') }}</li>
                                        <li>{{ $workout->availableSeats }} {{ __('Seats') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        PROGRAM END
    =============================--> --}}

    {{-- <!--============================
        MACHINE START
    =============================--> --}}
    @if (isset($section->machine_visibility) && $section->machine_visibility)
        <section class="wsus__machine pt_110 xs_pt_90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 m-auto wow fadeInUp">
                        <div class="wsus__section_headeing mb_50">
                            <h6>{{ $homepage?->translation?->about_us_sub_title }}</h6>
                            <h2>
                                {{ $homepage?->translation?->about_us_title }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="wsus__machine_bg wow fadeInUp">
                    <div class="row  justify-content-between">
                        <div class="col-lg-6 col-xl-6">
                            <div class="wsus__machine_text">
                                <h2>
                                    {{ $homepage?->translation?->about_us_inner_title }}
                                </h2>
                                <ul>
                                    @if ($homepage?->translation?->about_us_description_list)
                                        @foreach ($homepage?->translation?->about_us_description_list as $index => $list)
                                            <li>
                                                <span>{{ $index + 1 }}</span>
                                                {{ $list }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <a href="{{ $homepage?->about_us_button_link }}"
                                    class="common_btn common_btn_2">{{ $homepage?->translation?->about_us_button_text }}<i
                                        class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5">
                            <div class="wsus__machine_slider_area">
                                <div class="row machin_slider">
                                    @if ($homepage?->about_us_images)
                                        @foreach ($homepage?->about_us_images as $img)
                                            <div class="col-12">
                                                <div class="wsus__machine_slider_item">
                                                    <img src="{{ asset($img) }}" alt="machin" class="img-fluid">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        MACHINE END
    =============================--> --}}


    {{-- <!--============================
        COUNTER END
    =============================--> --}}
    @if (isset($section->counter_visibility) && $section->counter_visibility)
        <section class="wsus__home_counter mt_95 xs_mt_75 mb_120 xs_mb_100">
            <div class="container">
                <div class="row">
                    @foreach ($counters as $counter)
                        <div class="col-md-6 col-xl-3 wow fadeInUp">
                            <div class="wsus__home_counter_item">
                                <h2><span class="count">{{ $counter->number }}</span></h2>
                                <p>{{ $counter->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        COUNTER END
    =============================--> --}}


    {{-- <!--============================
        TRAINER START
    =============================--> --}}
    @if (isset($section->trainer_visibility) && $section->trainer_visibility)
        <section class="wsus__trainer pt_110 xs_pt_90 pb_120 xs_pb_100"
            style="background: url('{{ asset($homepage?->team_bg_image) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-xxl-5 m-auto wow fadeInUp">
                        <div class="wsus__section_headeing mb_25">
                            <h2>{{ $homepage?->translation?->team_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($trainers as $trainer)
                        <div class="col-md-6 col-lg-4 wow fadeInUp">
                            @include('components.trainer', ['trainer' => $trainer])
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12 text-center mt_60 wow fadeInUp">
                        <a class="common_btn" href="{{ $pageUtility->cta_link }}"><i
                                class="{{ $pageUtility->cta_icon }}"></i>{{ $pageUtility?->translation?->cta_button }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- <!--============================
        TRAINER END
    =============================--> --}}



    {{-- <!--============================
        PRICING START
    =============================--> --}}
    @if (isset($section->pricing_visibility) && $section->pricing_visibility)
        <section class="wsus__pricing mt_110 xs_mt_90 mb_120 xs_mb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 m-auto wow fadeInUp">
                        <div class="wsus__section_headeing mb_45">
                            <h2>{{ $content?->translation?->pricing_title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 m-auto text-center">
                        <div class="wsus__pricing_nav">
                            <ul class="nav nav-pills" id="pills-tabprice" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-homeprice-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-homeprice" type="button" role="tab"
                                        aria-controls="pills-homeprice"
                                        aria-selected="true"><span>{{ __('Monthly') }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profileprice-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profileprice" type="button" role="tab"
                                        aria-controls="pills-profileprice"
                                        aria-selected="false"><span>{{ __('Yearly') }}</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContentprice">
                    <div class="tab-pane fade show active" id="pills-homeprice" role="tabpanel"
                        aria-labelledby="pills-homeprice-tab" tabindex="0">
                        <div class="row">
                            @foreach ($plans as $plan)
                                <div class="col-md-6 col-lg-4 wow fadeInUp">
                                    @include('components.price-plan', [
                                        'plan' => $plan,
                                        'type' => 'monthly',
                                    ])
                                </div>
                                @unset($plan)
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profileprice" role="tabpanel"
                        aria-labelledby="pills-profileprice-tab" tabindex="0">
                        <div class="row">
                            @foreach ($plans as $plan)
                                <div class="col-md-6 col-lg-4">
                                    @include('components.price-plan', [
                                        'plan' => $plan,
                                        'type' => 'annually',
                                    ])
                                </div>
                                @unset($plan)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        PRICING END
    =============================--> --}}


    {{-- <!--============================
        VIDEO START
    =============================--> --}}
    @if (isset($section->video_visibility) && $section->video_visibility)
        <section class="wsus__video pt_190 xs_pt_100 pb_175 xs_pb_95"
            style="background: url('{{ asset($homepage?->video_bg_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 wow fadeInUp">
                        <div class="wsus__video_area_btn">
                            <a class="play_btn venobox vbox-item" data-autoplay="true" data-vbtype="video"
                                href="{{ $homepage?->video_button_link }}">
                                <i class="fas fa-play" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="wsus__section_headeing heading_left mt_40">
                            <h2>{{ $homepage?->translation?->video_section_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        VIDEO END
    =============================--> --}}



    {{-- <!--============================
            BRANDING START
        =============================--> --}}
    @if (isset($section->brand_visibility) && $section->brand_visibility)
        <section class="wsus__branding">
            <div class="container">
                <div class="row branding_slider">
                    @foreach ($partners as $partner)
                        <div class="col-xl-2 wow fadeInUp">
                            <a href="{{ $partner->link }}" class="wsus__branding_img">
                                <div class="img">
                                    <img src="{{ asset($partner->logo) }}" alt="brand" class="img-fluid w-100">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        BRANDING END
    =============================--> --}}


    {{-- <!--============================
        TESTIMONIAL START
    =============================--> --}}
    @if (isset($section->testimonial_visibility) && $section->testimonial_visibility)
        <section class="wsus__testimonial mt_120 xs_mt_100">
            <div class="container">
                <div class="wsus__testimonial_area pt_85 pb_90 wow fadeInUp"
                    style="background: url('{{ asset($homepage?->testimonial_image) }}') center center / cover no-repeat;">
                    <div class="row slider-for">
                        @foreach ($testimonials as $testimonial)
                            <div class="col-xl-12">
                                <div class="wsus__testimonial_content">
                                    <p>{{ $testimonial->comment }}</p>
                                    <h6>{{ $testimonial->name }}</h6>
                                    <span>{{ $testimonial->designation }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="wsus_small_slider_img_area mt_40">
                        <div class="row slider-nav">
                            @foreach ($testimonials as $testimonial)
                                <div class="col-xl-4">
                                    <div class="wsus__slider_small_img">
                                        <img src="{{ asset($testimonial->image) }}" alt="img"
                                            class="img-fluid w-100">
                                    </div>
                                </div>
                            @endforeach
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
        BLOG START
    =============================--> --}}
    @if (isset($section->blog_visibility) && $section->blog_visibility)
        <section class="wsus__blog pt_105 xs_pt_85 pb_120 xs_pb_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="wsus__section_headeing heading_left mb_50">
                            <h2>{{ $content?->translation?->blog_title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row blog_slider">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 wow fadeInUp">
                            @include('components.website.blog-item', ['blog' => $blog])
                        </div>
                        @unset($blog)
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        BLOG END
    =============================--> --}}
@endsection

@push('scripts')
    <script>
        'use strict';

        $(document).ready(function() {
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
        })
    </script>
@endpush
