@extends('website.user.layout.layout')

@section('title', 'Enrolled Workout')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Enrolled Workout') }}</h4>
        <div class="wsus__dashboard_order">
            <div class="row">
                @if ($workouts->count() > 0)
                    <div class="col-12 wow fadeInUp">
                        <div class="table-responsive">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th class="serial">{{ __('Serial') }}</th>
                                        <th class="package">{{ __('Workout Name') }}</th>
                                        <th class="p_date">{{ __('Enrolled Date') }}</th>
                                        <th class="e_date">{{ __('Expired Date') }}</th>
                                        <th class="price">{{ __('Price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workouts as $index => $enroll)
                                        <tr>
                                            <td class="serial">{{ $workouts->firstItem() + $index }}</td>
                                            <td class="package">
                                                <a href="{{ route('website.workout.details', $enroll->workout?->slug) }}">
                                                    {{ $enroll->workout?->name }}
                                                </a>
                                            </td>
                                            <td class="p_date">{{ $enroll->enroll_date }}</td>
                                            <td class="e_date">{{ $enroll->expire_date }}</td>
                                            <td class="price">{{ currency($enroll->payment?->total_amount) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', [
                        'message' => __('No Enrolled Workout'),
                    ])
                @endif
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp vis-animation">
                    <div class="wsus__pagination mt_60">
                        {{ $workouts->links('vendor.pagination.frontend') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
