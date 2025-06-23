@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Pricing Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Pricing Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Pricing')])

    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        PRICING START
    =============================--> --}}
    <section class="wsus__pricing wsus__pricing_page pt_110 xs_pt_90 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto wow fadeInUp">
                    <div class="wsus__section_headeing mb_45">
                        <h2>{{ $pageUtility->membership_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 m-auto text-center">
                    <div class="wsus__pricing_nav">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
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

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-homeprice" role="tabpanel"
                    aria-labelledby="pills-homeprice-tab" tabindex="0">
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                @include('components.price-plan', ['plan' => $plan, 'type' => 'monthly'])
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profileprice" role="tabpanel" aria-labelledby="pills-profileprice-tab"
                    tabindex="0">
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-md-6 col-lg-4">
                                @include('components.price-plan', ['plan' => $plan, 'type' => 'annually'])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__testimonial_2 service_det_testimonial pt_110 xs_pt_90 pb_115 xs_pb_95">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow fadeInLeft">
                    <div class="wsus__section_headeing heading_left mb_50">
                        <h2>{{ $content?->translation?->testimonial_title }}</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="wsus__testimonial_2_area">
            <div class="row testimonial_2_slider">
                @foreach ($testimonials as $testimonial)
                    <div class="col-xl-4 wow fadeInUp">
                        <div class="wsus__testimonial_2_item">
                            <div class="text">
                                <p>
                                    {{ $testimonial->translation?->comment }}
                                </p>
                            </div>
                            <div class="wsus__testimonial_2_reviewer">
                                <div class="wsus__slider_small_img">
                                    <img src="{{ asset($testimonial->image) }}" alt="review" class="img-fluid w-100">
                                </div>
                                <div class="name">
                                    <h4 class="title">{{ $testimonial->translation?->name }}</h4>
                                    <p>{{ $testimonial->translation?->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <!--============================
        PRICING END
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
