<header class="wsus__header_2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xl-5 col-md-5 d-none d-md-block">
                <div class="wsus__header_left">
                    <p>{{ __('Welcome to') }} {{ $setting->app_name }}</p>
                </div>
            </div>
            <div class="col-sm-12 col-xl-7 col-md-7">
                <ul class="wsus__header_right d-flex flex-wrap">
                    <li>
                        <a href="mailto:{{ isset($setting->website_email) ? $setting->website_email : '' }}">
                            <span><img src="{{ asset('website') }}/images/mail_icon_1.png" alt="user"
                                    class="img-fluid"></span>
                            {{ isset($setting->website_email) ? $setting->website_email : '' }}
                        </a>
                    </li>
                    @include('website.layout.partials.language-tag')
                    @include('website.layout.partials.currency')

                    <li>
                        @auth('web')
                            <a href="{{ route('website.user.dashboard') }}">
                                <span><img src="{{ asset('website') }}/images/user_icon_1.png" alt="user"
                                        class="img-fluid"></span>
                                {{ __('Profile') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <span><img src="{{ asset('website') }}/images/user_icon_1.png" alt="user"
                                        class="img-fluid"></span>
                                {{ __('Login') }}
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
