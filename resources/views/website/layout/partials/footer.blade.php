<footer class="wsus__footer pt_120 xs_pt_100">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-lg-3 wow fadeInUp">
                <div class="wsus__footer_left">
                    <div class="wsus__footer_logo">
                        <img src="{{ asset($setting->logo) }}" alt="logo" class="img-fluid w-100">
                    </div>
                    <p>
                        {{ isset($setting->website_short_description) ? $setting->website_short_description : '' }}
                    </p>
                    <ul class="d-flex flex-wrap">
                        @if (isset($setting->website_facebook_url))
                            <li><a
                                    href="{{ isset($setting->website_facebook_url) ? $setting->website_facebook_url : '' }}"><i
                                        class="fab fa-facebook-f" aria-hidden="true"></i>
                                </a></li>
                        @endif
                        @if (isset($setting->website_twitter_url))
                            <li><a
                                    href="{{ isset($setting->website_twitter_url) ? $setting->website_twitter_url : '' }}"><i
                                        class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        @endif
                        @if (isset($setting->website_linkedin_url))
                            <li><a
                                    href="{{ isset($setting->website_linkedin_url) ? $setting->website_linkedin_url : '' }}"><i
                                        class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                        @endif
                        @if (isset($setting->website_instagram_url))
                            <li><a
                                    href="{{ isset($setting->website_instagram_url) ? $setting->website_instagram_url : '' }}"><i
                                        class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

            @foreach ($footerMenu as $index => $footer)
                <div class="col-sm-6 col-lg-2 wow fadeInUp">
                    <div class="wsus__footer_manu">
                        <h4>{{ $footer->name }}</h4>
                        <ul>
                            @foreach (menuGetBySlug($footer->slug) as $item)
                                <li><a href="{{ url($item['link']) }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach



            <div class="col-sm-6 col-lg-3 wow fadeInUp">
                <div class="wsus__footer_right">
                    <h4>{{ __('Contact Us') }}</h4>
                    <ul>
                        <li>
                            <a href="callto:{{ isset($setting->website_phone) ? $setting->website_phone : '' }}">
                                <span><img src="{{ asset('website') }}/images/Calling.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                {{ isset($setting->website_phone) ? $setting->website_phone : '' }}
                            </a>
                        </li>

                        <li>
                            <a href="callto:{{ isset($setting->website_email) ? $setting->website_email : '' }}">
                                <span><img src="{{ asset('website') }}/images/sms.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                {{ isset($setting->website_email) ? $setting->website_email : '' }}
                            </a>
                        </li>
                        <li>
                            <p>
                                <span><img src="{{ asset('website') }}/images/location_icon_2.png" alt="icon"
                                        class="img-fluid w-100"></span>
                                {{ isset($setting->website_address) ? $setting->website_address : '' }}
                            </p>
                        </li>
                        <li>
                            @include('components.website.home.newsletter')
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 wow fadeInUp">
                <div class="wsus__copy_right mt_115 xs_mt_95">
                    <p><a href="{{ route('website.home') }}">{{ $setting->copyright_text }}</a></p>
                    <ul class="d-flex flex-wrap">
                        <li><a href="{{ route('website.privacy-policy') }}">{{ __('Privacy Policy') }}</a></li>
                        <li><a href="{{ route('website.terms-conditions') }}">{{ __('Terms of Use') }}</a></li>
                        <li><a href="{{ route('website.pages', 'cookie-policy') }}">{{ __('Cookie Policy') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
