@extends('website.layout.master')
@section('title')
    {{ 'Order Fail' . ' || ' . $setting->app_name }}
@endsection
@section('content')
    @include('components.website.breadcrum', ['title' => __('Order Failed')])


    <section class="wsus__checkout mt_110 xs_mt_90 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <img src="{{ asset('uploads/website-images/fail.png') }}" alt="" class="fail-image">
                    <h6 class="mt-2">{{ __('Your order has been failed') }}</h6>
                    <p class="mt-2">{{ __('Please try again for more details connect with us') }}</p>
                    <a href="{{ route('website.user.dashboard') }}"
                        class="common_btn common_btn_2 mt-2">{{ __('Go to Dashboard') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
