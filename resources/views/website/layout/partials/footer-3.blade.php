<footer class="wsus__footer wsus__footer_3">
    <div class="row">
        <div class="col-xl-3 wow fadeInUp">
            <div class="wsus__footer_left">
                <div class="wsus__footer_logo">
                    <img src="{{ asset($setting->logo) }}" alt="logo" class="img-fluid w-100">
                </div>
                <p>
                    {{ isset($setting->website_short_description) ? $setting->website_short_description : '' }}
                </p>
                <ul class="d-flex flex-wrap">
                    @if (isset($setting->website_facebook_url))
                        <li><a href="{{ isset($setting->website_facebook_url) ? $setting->website_facebook_url : '' }}"><i
                                    class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a></li>
                    @endif
                    @if (isset($setting->website_twitter_url))
                        <li><a href="{{ isset($setting->website_twitter_url) ? $setting->website_twitter_url : '' }}"><i
                                    class="fab fa-twitter" aria-hidden="true"></i></a></li>
                    @endif
                    @if (isset($setting->website_linkedin_url))
                        <li><a href="{{ isset($setting->website_linkedin_url) ? $setting->website_linkedin_url : '' }}"><i
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
        <div class="col-xl-9">
            <div class="wsus__footer_3_right">
                <div class="wsus__footer_3_right_link">
                    <div class="row justify-content-between">
                        @foreach ($footerMenu as $footer)
                            <div class="col-sm-6 col-lg-3 wow fadeInUp">
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
                                        <p>
                                            <span><img src="{{ asset('website') }}/images/location_icon_2.png"
                                                    alt="icon" class="img-fluid w-100"></span>
                                            {{ isset($setting->website_address) ? $setting->website_address : '' }}
                                        </p>
                                    </li>
                                    <li>
                                        <a
                                            href="mailto:{{ isset($setting->website_email) ? $setting->website_email : '' }}">
                                            <span><img src="{{ asset('website') }}/images/sms.png" alt="icon"
                                                    class="img-fluid w-100"></span>
                                            {{ isset($setting->website_email) ? $setting->website_email : '' }}
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="callto:{{ isset($setting->website_phone) ? $setting->website_phone : '' }}">
                                            <span><img src="{{ asset('website') }}/images/Calling.png" alt="icon"
                                                    class="img-fluid w-100"></span>
                                            {{ isset($setting->website_phone) ? $setting->website_phone : '' }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 wow fadeInUp">
                            <div class="wsus__download_link">
                                @if (isset($setting->footer_app_link_android) || isset($setting->footer_app_link_ios))
                                    <h4>{{ __('Get apps on!') }}</h4>
                                @endif
                                <ul>
                                    @if (isset($setting->footer_app_link_android))
                                        <li>
                                            <a href="{{ $setting->footer_app_link_android }}" class="ios">
                                                <span><img src="{{ asset('website') }}/images/ios.png" alt="ios"
                                                        class="img-fluid w-100"></span>{{ __('Download iOS') }}</a>
                                        </li>
                                    @endif
                                    @if (isset($setting->footer_app_link_ios))
                                        <li>
                                            <a href="{{ $setting->footer_app_link_ios }}" class="android">
                                                <span>
                                                    <img src="{{ asset('website') }}/images/android.png" alt="android"
                                                        class="img-fluid w-100">
                                                </span>
                                                {{ __('Download Android') }}
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt_115 xs_mt_95 wow fadeInUp">
                        <div class="wsus__copy_right">
                            <p>
                                <a href="{{ route('website.home') }}">
                                    {{ $setting->copyright_text }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
