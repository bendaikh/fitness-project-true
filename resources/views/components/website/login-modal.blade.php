 <!-- Login Modal -->
 <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <section class="wsus__login mt_120 xs_mt_100 mb_120 xs_mb_100">
                <div class="row">
                    <div class="col-lg-6 col-xl-7 wow fadeInLeft">
                        <div class="wsus__login_img">
                            <img src="{{ asset('website/images/login_img.jpg') }}" alt="login"
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 wow fadeInRight">
                        <div class="wsus__login_contant">
                            <h2>{{ __('Login') }}</h2>
                            <p>{{ __('Login with fitnes & get healthy') }}</p>
                            <form action="{{ route('user-login') }}" class="wsus__login_form" Method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="{{ __('Email') }}">
                                <input type="password" name="password" placeholder="{{ __('Password') }}">

                                @if ($setting->recaptcha_status == 'active')
                                    <div class="form-group inflanar-form-input mg-top-20">
                                        <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}">
                                        </div>
                                    </div>
                                @endif
                                <button type="submit" class="common_btn common_btn_2">{{ __('Log In') }}</button>
                            </form>
                            <b>{{ __('Or') }}</b>

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
                                        <a href="{{ route('auth.social', $case->value) }}"
                                            class="wsus__login_others_option">
                                            <img src="{{ asset('website/images/google_login.png') }}"
                                                alt="google" class="img-fluid w-100">{{ __('Google') }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif

                            <p class="sign_up">{{ __("Don't have an account") }} ? <a
                                    href="{{ route('register') }}">{{ __('Sign up') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
         </div>
     </div>
 </div>
 <!--Login Modal -->
