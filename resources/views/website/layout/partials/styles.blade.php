<link rel="stylesheet" href="{{ asset('website/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/slick.css') }}">

@if (isLiveSite())
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">
@endif

<link rel="stylesheet" href="{{ asset('website/css/venobox.min.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/scroll_button.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/animated_barfiller.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/range_slider.css') }}">
<link rel="stylesheet" href="{{ asset('global/css/bootstrap-datepicker.min.css') }}">
@if (isLiveSite())
    <link rel="stylesheet" href="{{ asset('website/css/spacing.min.css') }}?v={{ $setting->version }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.min.css') }}?v={{ $setting->version }}">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.min.css') }}?v={{ $setting->version }}">
@else
    <link rel="stylesheet" href="{{ asset('website/css/spacing.css') }}?v={{ $setting->version }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}?v={{ $setting->version }}">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}?v={{ $setting->version }}">
@endif
@if (session()->has('text_direction') && session()->get('text_direction') !== 'ltr')
    @if (isLiveSite())
        <link rel="stylesheet" href="{{ asset('website/css/rtl.min.css') }}?v={{ $setting->version }}">
    @else
        <link rel="stylesheet" href="{{ asset('website/css/rtl.css') }}?v={{ $setting->version }}">
    @endif
@endif

<link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

<style>
    #toast-container {
        z-index: 999999;
        margin-top: 50px !important;
    }
</style>


@if (!Route::is('website.home'))
    <style>
        .wsus__header_3 {
            background: var(--colorBlue) !important;
        }
    </style>
@endif

@if (session()->has('text_direction') && session()->get('text_direction') !== 'ltr')
    <style>
        .wsus__product__sidebar_rating ul li label i {
            margin-right: 0;
            margin-left: 5px;
        }
    </style>
@endif

{{-- dynamic color --}}
<style>
    :root {
        --colorPrimary: {{ $setting->primary_color }};
        --colorBlue: {{ $setting->secondary_color }};
        --colorBlack: {{ $setting->common_color_one }};
        --colorGray: {{ $setting->common_color_two }};
        --paraColor: {{ $setting->common_color_three }};
        --lightBg: {{ $setting->common_color_four }};
        --DarkVersion: {{ $setting->common_color_five }};
        --ratingColor: {{ $setting->common_color_six }};
    }
</style>
@stack('css')
@if (customCode()?->css)
    <style>
        {!! customCode()->css !!}
    </style>
@endif
