@extends('website.layout.master')

@section('title')
    {{ html_decode($workout->name) }} || {{ seoSetting()->where('page_name', 'Workout Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Workout Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Workout Details')])

    <section class="wsus__blog_details wsus__program_details mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wow fadeInUp">
                    <div class="wsus__blog_details_left wsus__program_details_left">
                        <div class="wsus__program_details_img_1 wow fadeInUp">
                            <img src="{{ asset($workout->image) }}" alt="Workout" class="img-fluid w-100">
                        </div>
                        <div
                            class="wsus__program_pdf_download_btn wow fadeInUp d-flex flex-wrap justify-content-between align-items-center mt-3">
                            {{-- enroll start in --}}
                            @php
                                $applyCoupon = true;
                            @endphp
                            @if ($workout->enroll_start > now())
                                <p>{{ __('Enroll Start In:') }}</p>
                                <div class="simply-countdown simply-countdown-one"></div>
                            @elseif($workout->enroll_start < now() && $workout->enroll_end > now())
                                <p>{{ __('Enroll Ends In:') }}</p>
                                <div class="simply-countdown simply-countdown-one"></div>


                                <a href="javascript:;"
                                    class="common_btn {{ $already_enrolled ? ($applyCoupon = false) : 'enroll_button' }}">{{ $already_enrolled ? __('Already Enrolled') : __('Enroll Now') }}<i
                                        class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                            @else
                                @php
                                    $applyCoupon = false;
                                @endphp
                                <a href="javascript:;" class="common_btn btn disabled">{{ __('Expired') }}</a>
                            @endif
                        </div>


                        <span class="wsus__workout_clocktime wow fadeInUp"><img
                                src="{{ asset('website') }}/images/clock_2.png" alt="clock"
                                class="img-fluid w-100">{{ $workout->training_days }} {{ __('Days') }} |
                            {{ $workout->availableSeats }} {{ __('Seats Left') }}</span>


                        <h2 class="mt_20 wow fadeInUp">{{ $workout->name }}</h2>


                        <div class="wsus__blog_det_text">
                            {!! clean(nl2br($workout->description)) !!}
                        </div>


                        @if (count($workout->image_url ?? []) > 0)
                            <h2 class="mt_50 wow fadeInUp">{{ __('Photo Gallery') }}</h2>
                        @endif
                        <div class="wsus__program_photo_gallery">
                            <div class="row program_photo_slider">
                                @foreach ($workout->image_url ?? [] as $index => $url)
                                    <div class="col-sm-6 col-lg-4 col-xl-4 wow fadeInUp">
                                        @include('components.website.photo-gallery', ['url' => $url])
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if (count($workout->videos ?? []) > 0)
                            <h2 class="mt_55 wow fadeInUp">{{ __('Video Gallery') }}</h2>
                        @endif
                        <div class="row mt_25 program_details_slider">
                            @foreach ($workout->videos ?? [] as $index => $video)
                                @if ($index == 3)
                                @break
                            @endif
                            <div class="col-md-6 col-xl-6 wow fadeInUp">
                                @include('components.website.video-gallery', ['video' => $video])
                            </div>
                        @endforeach
                    </div>
                    @if (count($workout->trainers ?? []) > 0)
                        <h2 class="mt_50 wow fadeInUp">{{ __('Instructor') }}</h2>
                        <div class="wsus__workout_details_triner">
                            <div class="row program_photo_slider">
                                @foreach ($workout->trainers ?? [] as $index => $trainer)
                                    <div class="col-sm-6 col-lg-4 col-xl-4 wow fadeInUp">
                                        @include('components.trainer', ['trainer' => $trainer])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 wow fadeInUp">
                <div class="sticky_sidebar">
                    <div class="wsus__blog_details_right wsus__workout_details_right">
                        <div class="wsus__blog_sidebar_wizard wsus__workout_details_right_searchbox wow fadeInUp">
                            <h4>{{ __('Search Workout') }}</h4>
                            <form action="{{ route('website.workout') }}">
                                <input type="text" placeholder="{{ __('Search Workout') }}" name="search">
                                <button type="submit"><i class="far fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <div class="wsus__blog_sidebar_wizard wow fadeInUp">
                            <h4>{{ __('Contact Info') }}</h4>
                            <form action="#" class="wsus__program_details_sidebar_form" method="post">
                                @csrf
                                <input type="hidden" name="workout_id" value="{{ $workout->id }}">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="input">
                                            <input type="text" placeholder="{{ __('Name') }}*" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input">
                                            <input type="email" placeholder="{{ __('Email') }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input">
                                            <input type="text" placeholder="{{ __('Phone Number') }}*"
                                                name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input">
                                            <textarea rows="4" placeholder="{{ __('Write a Description') }}*" name="message"></textarea>
                                        </div>
                                    </div>
                                    @if ($setting->recaptcha_status == 'active')
                                        <div class="col-xl-12">
                                            <div class="wsus__contact_form_input">
                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ $setting->recaptcha_site_key }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-xl-12">
                                        <div class="input_btn mt_30">
                                            <button type="submit" class="common_btn">{{ __('Send Message') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if ($applyCoupon)
                            <div class="wsus__blog_sidebar_wizard wsus__workout_apply_coupon wow fadeInUp">
                                <h4>{{ __('Apply Coupon') }}</h4>
                                <form action="javascript:;" id="coupon_form">
                                    <input type="hidden" name="author_id" value="0">
                                    <input type="hidden" name="amount" value="{{ $workout->price }}">
                                    <input type="text" placeholder="{{ __('Coupon Code') }}" name="coupon">
                                    <button type="submit">{{ __('Apply') }}</button>
                                </form>
                                <p
                                    class="ms-1 mt-1 coupon_section {{ session('workout_coupon_code') ? '' : 'd-none' }}">
                                    <span>{{ __('Applied') }}</span>
                                    <span class="color-black coupon_name">{{ session('workout_coupon_code') }}</span>
                                    <span class="ms-3 remove_coupon" title="Remove Coupon"><i
                                            class="fal fa-times"></i></span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



@push('scripts')
<script src="{{ asset('website/js/simplyCountdown.js') }}"></script>
<script>
    "use strict";
    $(document).ready(function() {
        $("#coupon_form").on("submit", function(e) {
            e.preventDefault();

            const coupon = $('[name="coupon"]').val();
            if (coupon === '') {
                toastr.error('{{ __('Please enter a coupon code') }}');
                return;
            }

            const formData = $('#coupon_form').serialize();
            $.ajax({
                type: 'get',
                data: formData,
                url: "{{ route('website.workout.apply.coupon') }}",
                beforeSend: function() {
                    $("#coupon_form button[type='submit']").html(
                        '<i class="fas fa-spinner fa-spin"></i>'
                    )
                    $("#coupon_form button").attr("disabled", true);
                },
                success: function(response) {
                    toastr.success(response.message)
                    $(".coupon_section").removeClass("d-none");
                    $('.coupon_name').text(response.workout_coupon_code)
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
            $(this).removeClass('remove_coupon');
            button.html('<i class="fas fa-spinner fa-spin"></i>')
            $.ajax({
                type: 'get',
                url: "{{ route('website.workout.remove.coupon') }}",
                success: function(response) {
                    toastr.success(response.message)
                    $(".coupon_section").addClass("d-none");
                    button.html('<i class="fal fa-times"></i>')
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

        $('.enroll_button').on('click', function() {

            const seat = "{{ $workout->available_seats }}";
            if (seat == 0) {
                toastr.error("{{ __('No seat available') }}");
                return;
            }
            const user = "{{ auth()->user() }}";

            if (user == '') {
                window.location.href = "{{ route('login') }}";
                return;
            }
            const route = "{{ route('website.payment') }}?type=workout";
            window.location.href = route;
        })

        $('.wsus__program_details_sidebar_form').on('submit', function(e) {
            e.preventDefault();
            if ($("#g-recaptcha-response").val() === '') {
                e.preventDefault();
                @if ($setting->recaptcha_status == 'active')
                    toastr.error("Please complete the recaptcha to submit the form")
                    return;
                @endif
            }
            const button = $(this).find('button[type="submit"]');
            button.html('<i class="fas fa-spinner fa-spin"></i>')
            $.ajax({
                type: 'post',
                url: "{{ route('website.workout.contact') }}",
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success(response.message)
                    } else {
                        toastr.error(response.message)
                    }
                    button.html('{{ __('Submitted') }}')

                    // reset form
                    $(".wsus__program_details_sidebar_form").trigger("reset");
                },
                error: function(response) {
                    console.log(response);
                    if (response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function(key, value) {
                            toastr.error(value)
                        })
                    }
                },
                complete: function() {
                    button.html('{{ __('Send Message') }}')
                }
            })
        })
    })

    // Extracting the order creation date and maximum minutes into variables
    let currentTime = new Date();
    let enrollStart = new Date("{{ $workout->enroll_start }}");

    // check if enrollStart time is today or later
    if (enrollStart < currentTime) {
        enrollStart = new Date("{{ $workout->enroll_end }}");
    }


    // Initializing the countdown
    simplyCountdown('.simply-countdown-one', {
        year: enrollStart.getFullYear(),
        month: enrollStart.getMonth() + 1,
        day: enrollStart.getDate(),
        hours: enrollStart.getHours(),
        minutes: enrollStart.getMinutes(),
        seconds: enrollStart.getSeconds(),
        enableUtc: false,
        words: {
            days: {
                singular: 'day',
                plural: 'days'
            },
            hours: {
                singular: 'hour',
                plural: 'hours'
            },
            minutes: {
                singular: 'minute',
                plural: 'minutes'
            },
            seconds: {
                singular: 'second',
                plural: 'seconds'
            }
        },
        inline: false,
    });
</script>
@endpush
