@extends('admin.auth.app')
@section('title')
    <title>{{ __('Login') }}</title>
@endsection
@section('content')
    <section class="overflow-hidden section">
        <div class="my-0">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-6 d-none d-lg-block">
                    <div class="admin_login_bg_left_image">
                        <img src="{{ asset('backend/img/login_bg.png') }}" alt="" class="img-fluid w-100">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-9 m-auto">
                    <div class="admin_login_area">
                        <div class="login-brand">
                            <a href="{{ route('website.home') }}">
                                <img
                                    src="{{ file_exists(public_path($setting->admin_logo)) ? asset($setting->admin_logo) : asset('backend/img/admin_logo.png') }}">
                            </a>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <x-admin.form-title :text="__('Admin Login')" />
                            </div>

                            <div class="card-body">
                                <form novalidate="" id="adminLoginForm" action="{{ route('admin.store-login') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        @if (app()->isLocal() && app()->hasDebugModeEnabled())
                                            <x-admin.form-input type="email" id="email" name="email"
                                                label="{{ __('Email') }}" value="admin@gmail.com" required="true" />
                                        @else
                                            <x-admin.form-input type="email" id="email" name="email"
                                                label="{{ __('Email') }}" value="{{ old('email') }}" required="true" />
                                        @endif
                                    </div>

                                    <div class="form-group mb-3">
                                        @if (app()->isLocal() && app()->hasDebugModeEnabled())
                                            <x-admin.form-input type="password" id="password" label="{{ __('Password') }}"
                                                name="password" value="1234" required="true" />
                                        @else
                                            <x-admin.form-input type="password" id="password" label="{{ __('Password') }}"
                                                name="password" required="true" />
                                        @endif
                                    </div>

                                    <div class="form-group d-flex justify-content-between mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" tabindex="3"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                        <a href="{{ route('admin.password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    </div>

                                    <div class="form-group mb-1">
                                        <x-admin.button type="submit" class="btn-lg btn-block"
                                            text="{{ __('Login') }}" />
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
