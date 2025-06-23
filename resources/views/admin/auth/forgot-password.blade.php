@extends('admin.auth.app')
@section('title')
    <title>{{ __('Forgot Password') }}</title>
@endsection
@section('content')
    <section class="overflow-hidden section">
        <div class="my-0">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-6 d-none d-lg-block">
                    <div class="admin_login_bg_left_image">
                        <img src="{{ asset('backend/img/admin_forgot_password.png') }}" alt="" class="img-fluid w-100">
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
                                <x-admin.form-title :text="__('Forgot Password')" />
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.forget-password') }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email exampleInputEmail" type="email" class="form-control"
                                            name="email" tabindex="1" autofocus placeholder="{{ old('email') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button id="adminLoginBtn" type="submit" class="btn btn-primary btn-lg btn-block"
                                            tabindex="4">
                                            {{ __('Send Reset Link') }}
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
    </section>
@endsection
