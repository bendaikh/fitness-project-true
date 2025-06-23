@extends('admin.auth.app')
@section('title')
    <title>{{ __('Reset Password') }}</title>
@endsection
@section('content')
    <section class="overflow-hidden section">
        <div class="my-0">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-6 d-none d-lg-block">
                    <div class="admin_login_bg_left_image">
                        <img src="{{ asset('backend/img/admin_reset_password.png') }}" alt="" class="img-fluid w-100">
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
                                <h4>{{ __('Reset Password') }}</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.password.reset-store', $token) }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email exampleInputEmail" type="email" class="form-control"
                                            name="email" tabindex="1" autofocus placeholder="{{ old('email') }}"
                                            value="{{ $admin->email }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password"
                                            placeholder="{{ __('Password') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <button id="adminLoginBtn" type="submit" class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="d-block">
                                            <a href="{{ route('admin.login') }}">
                                                {{ __('Go to login page') }} <i class="fas fa-arrow-right"></i> </a>
                                        </div>
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
