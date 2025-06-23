<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>404 &mdash; {{ $setting->app_name }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('website/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('website/css/animate.css') }} ">

    <link rel="stylesheet" href="{{ asset('website/css/pointer.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">
</head>

<body>

    <!--============================
        ERROR START
    =============================-->
    <section class="wsus__error ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 wow fadeInUp">
                    <div class="wsus__error_area">
                        <div class="img">
                            <img src="{{ asset('website/images/error_img.png') }}" alt="error"
                                class="img-fluid w-100">
                        </div>
                        <h2>{{ __('Not Found') }}</h2>
                        <p>{{ __('The page you are looking for does not exist. It might have been moved or deleted') }}.
                        </p>
                        <a href="{{ route('website.home') }}" class="common_btn common_btn_2">BACK TO HOME<i
                                class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       ERROR END
    =============================-->


    <!--jquery library js-->
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('global/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('website/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('website/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/js/slick.min.js') }}"></script>
    <script src="{{ asset('website/js/venobox.min.js') }}"></script>
    <script src="{{ asset('website/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/animated_barfiller.js') }}"></script>
    <script src="{{ asset('website/js/jquery.countup.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('website/js/range_slider.js') }}"></script>
    <script src="{{ asset('website/js/sticky_sidebar.js') }}"></script>
    <script src="{{ asset('website/js/select2.min.js') }}"></script>
    <script src="{{ asset('website/js/pointer.js') }}"></script>
    <script src="{{ asset('global/js/bootstrap-datepicker.min.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('website/js/main.js') }}?v={{ $setting->version }}"></script>


    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

</body>

</html>
