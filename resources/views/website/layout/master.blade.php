<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>@yield('title', 'Fitness - WebSolutionUS')</title>
    @yield('meta')
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">

    {{-- style sheets --}}
    @include('website.layout.partials.styles')

    

    @include('website.layout.partials.dynamic-header-js')

</head>



<body
    class="{{ THEME == 4 && Route::is('website.home') ? 'home_4_dark' : '' }} {{ (THEME == 1 || THEME == 2) && Route::is('website.home') ? 'body_bg' : '' }}">

    @if ($setting->google_analytic_status == 'active')
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $setting->google_analytic_id }}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif

    <!--============================
        HEADER START
    =============================-->

    @switch(THEME)
        @case('2')
            @if (Route::is('website.home'))
                @include('website.layout.partials.topbar-2')
            @else
                @include('website.layout.partials.topbar')
            @endif
        @break

        @default
            @include('website.layout.partials.topbar')
    @endswitch
    <!--============================
        HEADER END
    =============================-->


    <!--============================
        MENU START
    =============================-->

    @switch(THEME)
        @case('all')
            @if (Route::is('website.home'))
                @if (request()->theme != '3' && request()->theme != '2')
                    @include('website.layout.partials.navbar')
                @elseif(request()->theme == '2')
                    @include('website.layout.partials.navbar-2')
                @else
                    @include('website.layout.partials.navbar-3')
                @endif
            @else
                @include('website.layout.partials.navbar')
            @endif
        @break

        @case('2')
            @if (Route::is('website.home'))
                @include('website.layout.partials.navbar-2')
            @else
                @include('website.layout.partials.navbar')
            @endif
        @break

        @case('3')
            @if (Route::is('website.home'))
                @include('website.layout.partials.navbar-3')
            @else
                @include('website.layout.partials.navbar')
            @endif
        @break

        @default
            @include('website.layout.partials.navbar')
    @endswitch


    <div class="wsus__menu_offconvas">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="fal fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <a class="offcanvas_logo" href="{{ route('website.home') }}">
                    <img src="{{ asset($setting->logo) }}" alt="Fitness" class="img-fluid">
                </a>
                <p class="description">
                    {{ isset($setting->website_short_description) ? $setting->website_short_description : '' }}
                </p>

                <div class="offcanvas_contact">
                    <h3>{{ __('Contact Us') }}</h3>
                    <p>
                        <span><img src="{{ asset('website') }}/images/location_icon_1.png" alt="location"
                                class="img-fluid w-100"></span>
                        {{ isset($setting->website_address) ? $setting->website_address : '' }}
                    </p>
                    <a href="mailto:{{ isset($setting->website_email) ? $setting->website_email : '' }}"
                        class="d-block">
                        <span><img src="{{ asset('website') }}/images/mail_icon_1.png" alt="mail"
                                class="img-fluid w-100"></span>
                        {{ isset($setting->website_email) ? $setting->website_email : '' }}
                    </a>
                    <a href="callto:{{ isset($setting->website_phone) ? $setting->website_phone : '' }}"
                        class="d-block">
                        <span><img src="{{ asset('website') }}/images/call_icon_1.png" alt="Call"
                                class="img-fluid"></span>
                        {{ isset($setting->website_phone) ? $setting->website_phone : '' }}
                    </a>
                </div>
                <ul class="d-flex flex-wrap">
                    <li><a href="{{ isset($setting->website_facebook_url) ? $setting->website_facebook_url : '' }}"><i
                                class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ isset($setting->website_instagram_url) ? $setting->website_instagram_url : '' }}"><i
                                class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ isset($setting->website_linkedin_url) ? $setting->website_linkedin_url : '' }}"><i
                                class="fab fa-linkedin-in"></i></a></li>
                    @if (isset($setting->website_instagram_url))
                        <li><a
                                href="{{ isset($setting->website_instagram_url) ? $setting->website_instagram_url : '' }}"><i
                                    class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!--============================
        MENU END
    =============================-->


    @yield('content')


    <!--============================
        SOCIAL MEDIA START
    =============================-->
    <section class="wsus__social_media">
        <div class="row">
            <div class="col-xl-12 wow fadeInUp">
                <ul class="d-flex flex-wrap">
                    <li><a href="{{ isset($setting->website_facebook_url) ? $setting->website_facebook_url : '' }}"
                            class="facebook">{{ __('Facebook') }}</a></li>
                    <li><a href="{{ isset($setting->website_instagram_url) ? $setting->website_instagram_url : '' }}"
                            class="insta">{{ __('Instagram') }}</a></li>
                    <li><a href="{{ isset($setting->website_linkedin_url) ? $setting->website_linkedin_url : '' }}"
                            class="linkdin">{{ __('Linkedin') }}</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--============================
        SOCIAL MEDIA END
    =============================-->

    @php
        if (cache()->has('footer_menu')) {
            $footerMenu = cache('footer_menu');
        } else {
            $footerMenu = Cache::rememberForever('footer_menu', function () {
                return \Modules\CustomMenu\app\Models\Menu::with('items.translation')
                    ->where('slug', 'footer-1-menu')
                    ->OrWhere('slug', 'footer-2-menu')
                    ->get();
            });
        }
    @endphp

    <!--============================
        FOOTER START
    =============================-->
    @switch(THEME)
        @case('all')
            @if (request()->theme != '3')
                @include('website.layout.partials.footer')
            @else
                @include('website.layout.partials.footer-3')
            @endif
        @break

        @case('3')
            @include('website.layout.partials.footer-3')
        @break

        @default
            @include('website.layout.partials.footer')
    @endswitch
    <!--============================
        FOOTER END
    =============================-->


    <!--============================
        SCROLL BUTTON START
    =============================-->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--============================
        SCROLL BUTTON END
    =============================-->

    @include('website.layout.partials.javascripts')


</body>

</html>
