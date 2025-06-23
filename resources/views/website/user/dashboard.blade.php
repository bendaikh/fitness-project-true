@extends('website.user.layout.layout')
@section('title', 'Dashboard')
@section('user-content')
    <div class="wsus__dashboard_main_contant">
        <div class="row">
            <div class="col-md-6 col-xl-4 mb_25 wow fadeInUp">
                <div class="wsus__profile_overview">
                    <p><i class="fas fa-shopping-cart"></i></p>
                    <h4>{{ $totalOrders }}</h4>
                    <p class="name">{{ __('Total Order') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb_25 wow fadeInUp">
                <div class="wsus__profile_overview green">
                    <p><i class="fas fa-list"></i></p>
                    <h4>{{ $enrollmentCount }}</h4>
                    <p class="name">{{ __('Total Workout Enroll') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mb_25 wow fadeInUp">
                <div class="wsus__profile_overview orange">
                    <p><i class="fas fa-bahai"></i></p>
                    <h4>{{ auth('web')->user()->reviews->count() }}</h4>
                    <p class="name">{{ __('Total Item Review') }}</p>
                </div>
            </div>
        </div>
        <div class="wsus__profile_info">
            @if ($currentPlan && $currentPlan->status == 0 && $currentPlan->payment_status == 'pending')
                <div class="wow fadeInUp mb-5">
                    <div class="alert alert-warning">
                        {{ __('Purchase Plan') }} : <strong>{{ $currentPlan->plan_name }}</strong>
                        <br>
                        {{ __('Please wait for admin approval') }}
                    </div>
                </div>
            @elseif ($currentPlan && $currentPlan->renewal_date > now()->format('Y-m-d'))
                <div class="wow fadeInUp mb-5">
                    <div class="alert alert-success">
                        {{ __('Current Membership') }} : <strong>{{ $currentPlan->plan_name }}</strong>
                        <br>
                        {{ __('Renew Date') }} : <strong>{{ $currentPlan->renewal_date }}</strong>
                    </div>
                </div>
            @elseif($currentPlan && $currentPlan->renewal_date < now()->format('Y-m-d'))
                <div class="wow fadeInUp mb-5">
                    <div class="alert alert-danger">
                        {{ __('Current Membership') }} : <strong>{{ $currentPlan->plan_name }}</strong>
                        <br>
                        {{ __('Renew Date') }} : <strong>{{ $currentPlan->renewal_date }}</strong>
                    </div>
                </div>
            @endif

            <div class="wsus__profile_info_top wow fadeInUp">
                <h4>{{ __('Personal Information') }}</h4>
                <a href="{{ route('website.user.edit-profile') }}"
                    class="common_btn common_btn_2">{{ __('Edit Info') }}</a>
            </div>

            <table class="wsus__profile_info_table wow fadeInUp">
                <tbody>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Phone') }}</th>
                        <td>{{ auth()->user()->phone ?? '(N/A)' }}</td>
                    </tr>
                    <tr class="text-lowercase">
                        <th class="text-capitalize">{{ __('Email') }}</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>

                    @if ($member)
                        <tr>
                            <th>{{ __('Member Id') }}</th>
                            <td>{{ $member->member_id ?? '(N/A)' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Locker No') }}</th>
                            <td>{{ $member->locker_no ?? '(N/A)' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Blood Group') }}</th>
                            <td>{{ $member->blood_group ?? '(N/A)' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Gender') }}</th>
                            <td>{{ $member->gender ? ucfirst($member->gender) : '(N/A)' }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Height') }}</th>
                            <td>
                                {{ $member->height }}
                                @if ($member->height)
                                    (cm)
                                @else
                                    (N/A)
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Weight') }}</th>
                            <td>
                                {{ $member->weight }}
                                @if ($member->weight)
                                    (kg)
                                @else
                                    (N/A)
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Chest') }}</th>
                            <td>
                                {{ $member->chest }}
                                @if ($member->chest)
                                    (inch)
                                @else
                                    (N/A)
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Age') }}</th>
                            <td>
                                @php
                                    $dob = $member->dob;
                                    $age = date_diff(date_create($dob), date_create('now'))->y;
                                @endphp
                                @if ($member->dob)
                                    {{ $age }} {{ __('Years') }}
                                @else
                                    (N/A)
                                @endif
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
