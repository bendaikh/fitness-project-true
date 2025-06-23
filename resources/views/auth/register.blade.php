@extends('website.layout.master')

@section('content')
    <!--============================
                BREADCRUMBS START
            =============================-->
    @include('components.website.breadcrum', ['title' => __('Registration')])
    <!--============================
                BREADCRUMBS END
            =============================-->

    <!--============================
                REGISTRATION START
            =============================-->
    <section class="wsus__login wsus__registration mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="row">
            <div class="col-lg-6 col-xl-7 wow fadeInLeft">
                <div class="wsus__login_img">
                    <img src="{{ asset($utility?->register_image) }}" alt="login" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-lg-6 col-xl-5 wow fadeInRight">
                <div class="wsus__login_contant wsus__registration_contant">
                    <h2>{{ __('Registration') }}</h2>
                    <p>{{ __('Login with fitnes & get healthy') }}</p>
                    <form action="{{ route('register') }}" class="wsus__login_form" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="{{ __('Name') }}">
                        <input type="text" name="email" placeholder="{{ __('Email') }}">

                        <input type="password" name="password" placeholder="{{ __('Password') }}">
                        <input type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">

                        @if ($setting->recaptcha_status == 'active')
                            <div class="form-group inflanar-form-input mg-top-20">
                                <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}"></div>
                            </div>
                        @endif
                        <button type="submit" class="common_btn common_btn_2">{{ __('Submit') }}</button>
                    </form>
                    @if (enum_exists('App\Enums\SocialiteDriverType'))
                        @php
                            $socialiteEnum = 'App\Enums\SocialiteDriverType';
                            $icons = $socialiteEnum::getIcons();
                        @endphp
                        @foreach ($socialiteEnum::cases() as $index => $case)
                            @php
                                if ($case->value != 'google') {
                                    continue;
                                }
                                $driverName = $case->value . '_login_status';
                            @endphp
                            @if ($setting->$driverName == 'active')
                                <b>{{ __('Or') }}</b>
                                <a href="{{ route('auth.social', $case->value) }}" class="wsus__login_others_option">
                                    <img src="{{ asset('website/images/google_login.png') }}" alt="google"
                                        class="img-fluid w-100">{{ __('Google') }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                    <p class="sign_up">{{ __('Have An Account') }}? <a
                            href="{{ route('login') }}">{{ __('Log In') }}</a></p>
                </div>
            </div>
        </div>
    </section>
    <!--============================
               REGISTRATION END
            =============================-->
@endsection
