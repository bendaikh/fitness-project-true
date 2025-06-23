@extends('admin.master_layout')
@section('title')
    <title>{{ __('Attendance Sheet') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Attendance Sheet') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Attendance Sheet') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" id="search-form" onchange="this.submit();">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search by name or ID') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 form-group">
                                            <select name="subscription_status" id="subscription_status" class="form-select">
                                                <option value="">{{ __('Subscription Status') }}</option>
                                                <option value="all">{{ __('All') }}</option>
                                                <option value="1"
                                                    {{ request('subscription_status') == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}
                                                </option>
                                                <option value="expired"
                                                    {{ request('subscription_status') == 'expired' ? 'selected' : '' }}>
                                                    {{ __('Expired') }}
                                                </option>
                                                <option value="no_plan"
                                                    {{ request('subscription_status') == 'no_plan' ? 'selected' : '' }}>
                                                    {{ __('No Plan') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <select name="par-page" id="par-page" class="form-select">
                                                <option value="">{{ __('Per Page') }}</option>
                                                <option value="10" {{ '10' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('10') }}
                                                </option>
                                                <option value="50" {{ '50' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('50') }}
                                                </option>
                                                <option value="100"
                                                    {{ '100' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('100') }}
                                                </option>
                                                <option value="all"
                                                    {{ 'all' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('All') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input type="text" id="monthYearPicker" class="form-control"
                                                value="{{ request()->get('month_year') ?? now()->format('m/Y') }}"
                                                name="month_year" autocomplete="off">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Member List') }}</h4>
                                <div class="attendance_type d-none d-flex justify-content-center align-items-center">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="attendance_type" value="present"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button selectgroup-button-icon">Present</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="attendance_type" value="absent"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button selectgroup-button-icon">Absent</span>
                                        </label>
                                    </div>
                                    @adminCan('attendance.store')
                                        <div class="button-container d-none">
                                            <button class="btn btn-success ms-2 submit-button"
                                                type="submit">{{ __('Apply') }}</button>
                                        </div>
                                    @endadminCan
                                </div>

                            </div>
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table attendance-table">
                                        <thead>
                                            @php
                                                $month_year = request()->month_year ?? now()->format('m/Y');

                                                $date = \Carbon\Carbon::createFromFormat('m/Y', $month_year);

                                                $month = $date->month;
                                                $year = $date->year;

                                                $totalDays = now()->month($month)->daysInMonth;
                                            @endphp
                                            <tr>
                                                <th rowspan="2" class="text-bottom sticky-1">{{ __('Name') }}</th>
                                                <th rowspan="2" class="sticky-2">{{ __('Member ID') }}</th>
                                                <th rowspan="1" colspan="2" class="text-center">
                                                    {{ __('Total') }}
                                                </th>
                                                <th rowspan="1" colspan="{{ $totalDays }}" class="text-center">
                                                    {{ __('Date') }}</th>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td colspan="1" class="text-white bg-green text-center th-present">P</td>
                                                <td colspan="1" class="text-white  bg-red  text-center th-absent">A</td>
                                                @for ($i = 1; $i <= $totalDays; $i++)
                                                    <td class="text-center  border-top">{{ $i }}</td>
                                                @endfor
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($members as $key => $member)
                                                @php
                                                    $attendance = $member->attendance;
                                                    $present = $attendance->where('status', 'present');
                                                    $absent = $attendance->where('status', 'absent');
                                                @endphp

                                                <tr>
                                                    <td class="sticky-1">{{ $member->user?->name }}</td>
                                                    <td class="sticky-2">{{ $member->member_id }}</td>
                                                    <td class="text-center ">{{ $present->count() }}</td>
                                                    <td class="text-center">{{ $absent->count() }}</td>
                                                    @for ($i = 1; $i <= $totalDays; $i++)
                                                        @php
                                                            $date = "$year-$month-$i";
                                                            $date = now()->parse($date);
                                                            $isPresent = $attendance
                                                                ->where('status', 'present')
                                                                ->where('date', $date->format('Y-m-d'))
                                                                ->first();
                                                            $isAbsent = $attendance
                                                                ->where('status', 'absent')
                                                                ->where('date', $date->format('Y-m-d'))
                                                                ->first();
                                                        @endphp
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a class="btn  dropdown-toggle {{ $isPresent ? 'present' : ($isAbsent ? 'absent' : '') }}"
                                                                    href="javascript:;" role="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    style="background:{{ $isPresent ? 'green' : ($isAbsent ? 'red' : '') }}; color:{{ $isPresent || $isAbsent ? 'white' : 'black' }}">
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item attendance"
                                                                            href="javascript:;"
                                                                            data-member-id={{ $member->id }}
                                                                            data-date={{ $date->format('Y-m-d') }}
                                                                            data-value="present">{{ __('Present') }}</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item attendance"
                                                                            href="javascript:;"
                                                                            data-member-id={{ $member->id }}
                                                                            data-date={{ $date->format('Y-m-d') }}
                                                                            data-value="absent">{{ __('Absent') }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">

                                    {{ $members->onEachSide(3)->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('js')
    <script>
        'use strict';
        $(document).ready(function() {
            $(document).on('click', '.attendance', function() {
                const id = $(this).data('member-id');
                const date = $(this).data('date');

                // check  if date is after today
                const today = new Date();
                const selectedDate = new Date(date);
                if (selectedDate > today) {
                    toastr.warning("{{ __('You can not mark attendance for future date') }}");
                    return;
                }

                const value = $(this).data('value');

                const data = {
                    member_id: [id],
                    date,
                    attendance: [value],
                }
                if (value === 'present') {
                    const a = $(this).parents('.dropdown-menu').siblings('a');
                    a.css({
                        'background': 'green',
                        'color': 'white'
                    }).addClass('present');

                    // check if a has any class of present or absent
                    if (a.hasClass('absent')) {
                        a.removeClass('absent');
                    }
                } else {
                    const a = $(this).parents('.dropdown-menu').siblings('a');
                    a.css({
                        'background': 'red',
                        'color': 'white'
                    }).addClass('absent');

                    // check if a has any class of present or absent
                    if (a.hasClass('present')) {
                        a.removeClass('present');
                    }
                }

                updateStatus(data)

            })

            $('#monthYearPicker').datepicker({
                format: "mm/yyyy", // Date format
                minViewMode: 1, // Only show months and years
                startView: 1, // Start with months view
                autoclose: true // Close picker after selection
            });
        })

        function updateStatus(data) {

            if (data.attendance.length > 0) {
                $.ajax({
                    type: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        ...data
                    },
                    url: "{{ route('admin.attendance.store') }}",
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: function(error) {
                        handleFetchError(error);
                    }
                })
            } else {
                toastr.warning("Please mark attendance");
            }
        }
    </script>
@endpush
