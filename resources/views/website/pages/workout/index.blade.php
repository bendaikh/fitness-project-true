@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Workout Page')->first()->seo_title ?? '' }}
@endsection

@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Workout Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}

    @include('components.website.breadcrum', ['title' => __('Workout')])

    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        WORKOUT START
    =============================--> --}}

    <section class="wsus__workout pt_95 xs_pt_75 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @forelse ($workouts as $workout)
                    <div class="col-md-6 col-xl-4 wow fadeInUp">
                        <div class="wsus__workout_item">
                            <div class="img">
                                <img src="{{ asset($workout->image) }}" alt="{{ $workout->name }}" class="img-fluid w-100">
                                <p>{{ currency($workout->price) }}</p>
                            </div>
                            <div class="wsus__workout_item_text">
                                <span><img src="{{ asset('website') }}/images/clock_2.png" alt="clock"
                                        class="img-fluid w-100">{{ $workout->training_days }} {{ __('Day') }} |
                                    {{ $workout->availableSeats }} {{ __('Seats Left') }}</span>
                                <a href="{{ route('website.workout.details', $workout->slug) }}"
                                    class="title">{{ $workout->name }}</a>
                                {!! clean(nl2br($workout->short_description)) !!}
                                <a href="{{ route('website.workout.details', $workout->slug) }}"
                                    class="common_btn white_btn common_btn_2">{{ __('More Details') }}<i
                                        class="far fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    @include('components.no-data-found', ['message' => __('No Workout Found')])
                @endforelse
            </div>
            @if ($workouts->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__pagination mt_60">
                            {{ $workouts->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    {{-- <!--============================
        WORKOUT END
    =============================--> --}}
@endsection


@php
    if (session()->forget('workout_coupon_code') || session()->forget('workout_coupon_price')) {
        session()->forget('workout_coupon_code');
        session()->forget('workout_coupon_price');
    }
@endphp
