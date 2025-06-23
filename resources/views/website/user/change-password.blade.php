@extends('website.user.layout.layout')

@section('title', 'Change Password')

@section('user-content')
    <div class="wsus__dashboard_main_contant">
        <h4>{{ __('Change Your Password') }}</h4>
        <form action="{{ route('website.user.update-password') }}" class="wsus__dashboard_change_password wow fadeInUp"
            method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <input type="password" placeholder="{{ __('Current Password') }}" name="current_password">
                </div>
                <div class="col-xl-12">
                    <input type="password" placeholder="{{ __('New Password') }}" name="password">
                </div>
                <div class="col-xl-12">
                    <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
                </div>
                <div class="col-xl-12">
                    <ul class="d-flex flex-wrap">
                        <li><a href="{{ route('website.user.dashboard') }}"
                                class="common_btn common_btn_2">{{ __('Cancel') }}</a>
                        </li>
                        <li><button type="submit" class="common_btn common_btn_2">{{ __('Save') }}</button></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
