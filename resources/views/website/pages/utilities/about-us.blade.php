@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'About Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'About Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('About')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        ABOUT US START
    =============================--> --}}

    @if (isset($section->about_section_visibility) && $section->about_section_visibility == 1)
        <div class="wsus__about_us pt_120 xs_pt_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-5 col-xl-5 wow fadeInLeft">
                        <div class="wsus__about_us_img">
                            <img src="{{ asset($aboutUs?->about_us_image) }}" alt="About Us" class="img-fluid w-100">
                            <h3>{{ $aboutUs?->translation?->title }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6 wow fadeInRight">
                        <div class="wsus__about_us_text">
                            <div class="wsus__section_heading_2 heading_left mb_20">
                                <h2>{{ $aboutUs?->translation?->about_us_title }}</h2>
                            </div>
                            {!! clean(nl2br($aboutUs?->translation?->about_us_description)) !!}
                            @if ($aboutUs?->about_us_button_link)
                                <a href="{{ $aboutUs?->about_us_button_link }}"
                                    class="common_btn common_btn_2">{{ $aboutUs?->translation?->about_us_button_text }}<i
                                        class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($section->choose_us_section_visibility) && $section->choose_us_section_visibility == 1)
        <div class="wsus__why_choose_us pt_120 xs_pt_90">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7 col-xl-6 wow fadeInUp">
                        <div class="wsus__why_choose_us_text">
                            <div class="wsus__section_heading_2 heading_left mb_20">
                                <h2>{{ $aboutUs?->translation?->choose_us_title }}</h2>
                            </div>
                            {!! clean(nl2br($aboutUs?->translation?->choose_us_description)) !!}

                            @if ($aboutUs?->choose_us_button_link)
                                <a href="{{ $aboutUs?->choose_us_button_link }}"
                                    class="common_btn common_btn_2">{{ $aboutUs?->translation?->choose_us_button_text }}<i
                                        class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-5 wow fadeInRight">
                        <div class="wsus__why_choose_us_img">
                            <img src="{{ asset($aboutUs?->choose_us_image_1) }}" alt="Why Choose" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (isset($section->support_section_visibility) && $section->support_section_visibility == 1)
        <section class="wsus__join_event wsus__join_event_2 wsus__join_event_3 pt_120 xs_pt_100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="wsus__video_button wow fadeInUp"
                            style="background: url('{{ asset($aboutUs?->support_us_image) }}');">
                            <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                href="{{ $aboutUs?->support_us_video }}">
                                <i class="fas fa-play"></i>
                            </a>
                            <div class="wsus__join_event_2_text wow fadeInRight">
                                <div class="wsus__section_heading_2 heading_left mb_20">
                                    <h2>{{ $aboutUs?->translation?->support_us_title }}</h2>
                                </div>
                                {!! clean(nl2br($aboutUs?->translation?->support_us_description)) !!}

                                @if ($aboutUs?->support_us_button_link)
                                    <a href="{{ $aboutUs?->support_us_button_link }}"
                                        class="common_btn common_btn_2">{{ $aboutUs?->translation?->support_us_button_text }}<i
                                            class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($section->exercise_section_visibility) && $section->exercise_section_visibility == 1)
        <section class="wsus__counter mt_120 xs_mt_60 pb_120 xs_pb_100">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-7 col-xl-6 wow fadeInUp">
                        <div class="wsus__counter_text">
                            <div class="wsus__section_headeing heading_left mb_20">
                                <h2>
                                    {{ $aboutUs?->translation?->exercise_title }}
                                </h2>
                            </div>
                            <p class="description">
                                {!! clean(nl2br($aboutUs?->translation?->exercise_description)) !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-5 wow fadeInRight">
                        <div class="wsus__counter_img">
                            <img src="{{ asset($aboutUs?->exercise_image) }}" alt="counter" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($section->about_trainer_visibility) && $section->about_trainer_visibility == 1)
        <section class="wsus__trainer pt_110 xs_pt_90 pb_120 xs_pb_100"
            style="background: url({{ asset($aboutUs?->team_image) }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 m-auto wow fadeInUp">
                        <div class="wsus__section_headeing mb_25">
                            <h2>
                                {{ $aboutUs?->translation?->team_title }}

                            </h2>
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
                        <a class="common_btn" href="{{ $pageUtility?->cta_link }}"><i
                                class="{{ $pageUtility?->cta_icon }}"></i>{{ $pageUtility?->cta_button }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="gray_bg_area pb_120 xs_pb_100">
        @if (isset($section->about_call_to_action_visibility) && $section->about_call_to_action_visibility == 1)
            <section class="wsus__call_to_action mt_95 xs_mt_75 mb_120 xs_mb_100">
                <div class="container">
                    <div class="row">
                        @foreach ($counters as $counter)
                            <div class="col-md-6 col-xl-3 wow fadeInUp">
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


        @if (isset($section->about_testimonial_visibility) && $section->about_testimonial_visibility == 1)
            <section class="wsus__testimonial">
                <div class="container">
                    <div class="wsus__testimonial_area pt_85 pb_90"
                        style="background:url('{{ asset($aboutUs?->testimonial_image) }}') center center / cover no-repeat;">
                        <div class="row slider-for">
                            @foreach ($testimonials as $testimonial)
                                <div class="col-xl-12 wow fadeInUp">
                                    <div class="wsus__testimonial_content">
                                        <p>{{ $testimonial->comment }}</p>
                                        <h6>{{ $testimonial->name }}</h6>
                                        <span>{{ $testimonial->designation }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="wsus_small_slider_img_area mt_40 wow fadeInUp">
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
    </div>
    {{-- <!--============================
        ABOUT US END
    =============================--> --}}
@endsection
