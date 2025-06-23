@extends('website.layout.master')

@section('content')
    <!--============================
                BREADCRUMBS START
            =============================-->
    @include('components.website.breadcrum', ['title' => __('Forgot Password')])
    <!--============================
                BREADCRUMBS END
            =============================-->


    <!--============================
                LOGIN START
            =============================-->
    <section class="wsus__login mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="row">
            <div class="col-lg-6 col-xl-7 wow fadeInLeft">
                <div class="wsus__login_img">
                    <img src="{{ asset($utility?->forget_password_image) }}" alt="login" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 wow fadeInRight">
                <div class="wsus__login_contant">
                    <h2>{{ __('Forget Password') }}?</h2>
                    <form action="{{ route('forget-password') }}" class="wsus__login_form" Method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="{{ __('Email') }}">
                        @if ($setting->recaptcha_status == 'active')
                            <div class="form-group inflanar-form-input mg-top-20">
                                <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}"></div>
                            </div>
                        @endif
                        <button type="submit" class="common_btn common_btn_2">{{ __('Forget Password') }}</button>
                        <a href="{{ route('login') }}" class="forgot_pass bottom-0">{{ __('Back To Login') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                LOGIN END
            =============================-->
@endsection
