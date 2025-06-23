@extends('admin.master_layout')
@section('title')
    <title>{{ __('Enrollment History') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Enrollment History') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Enrollment History') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    {{-- Search filter  start --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="workout" id="workout" class="form-select select2">
                                                <option value="">{{ __('Workout') }}</option>
                                                @foreach ($workouts as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ request('workout') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="asc" {{ request('order_by') == 'asc' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="desc"
                                                    {{ request('order_by') == 'desc' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
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
                                        <div class="col-md-4 form-group">
                                            <input type="text" class="form-control datepicker" id="start_date"
                                                name="start_date" placeholder="{{ __('Enrollment Start Date') }}"
                                                value="{{ request('start_date') }}" autocomplete="off">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" class="form-control datepicker" id="end_date"
                                                name="end_date" placeholder="{{ __('Enrollment End Date') }}"
                                                value="{{ request('end_date') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table member_table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th class="min_width" width="20%">{{ __('Workout') }}</th>
                                                <th class="min_width" width="10%">{{ __('User') }}</th>
                                                <th class="min_width" width="10%">{{ __('Enroll Date') }}</th>
                                                <th class="min_width" width="10%">{{ __('Class Start') }}</th>
                                                <th width="10%">
                                                    {{ __('Action') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($workoutHistories as $index => $history)
                                                <tr>
                                                    <td>{{ $workoutHistories->firstItem() + $index }}</td>
                                                    <td>{{ $history->workout->name }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('admin.customer-show', $history->user_id) }}">{{ $history->user->name }}</a>
                                                    </td>
                                                    <td>{{ $history->enroll_date }}</td>
                                                    <td>{{ $history->start_date }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="javascript:;" class="btn btn-primary btn-sm me-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#enroll-{{ $history->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn btn-danger btn-sm me-2"
                                                                onclick="deleteData({{ $history->id }})"><i
                                                                    class="fas fa-trash"></i></a>
                                                            @if ($history->payment?->payment_status == 'Pending')
                                                                <a href="javascript:;" class="btn btn-warning btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#status-{{ $history->id }}">
                                                                    <i class="fas fa-sync-alt"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $workoutHistories->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- modal --}}

    @foreach ($workoutHistories as $enroll)
        <div class="modal fade" id="enroll-{{ $enroll->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Enrollment Details') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tr>
                                <th>{{ __('Enroll Date') }}: </th>
                                <td>{{ $enroll->enroll_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Start Date') }}: </th>
                                <td>{{ $enroll->start_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Price') }}: </th>
                                <td>{{ currency($enroll->payment?->total_amount) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Status') }}</th>
                                <td>{{ $enroll->payment?->payment_status }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Payment Method') }}</th>
                                <td>{{ $enroll->payment?->payment_method }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Transaction Id') }}</th>
                                <td>{{ $enroll->payment?->transaction_id }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="status-{{ $enroll->id }}"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.workout.enrollment.update', $enroll->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Status') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="enroll_id">
                            <div class="form-group">
                                <label for="payment_status">{{ __('Payment Status') }}</label>
                                <select name="payment_status" class="form-select" id="payment_status">
                                    <option value="" disabled>{{ __('Select Payment Status') }}</option>
                                    <option value="pending"
                                        {{ $enroll->payment?->payment_status == 'Pending' ? 'selected' : '' }}>
                                        {{ __('Pending') }}</option>
                                    <option value="success"
                                        {{ $enroll->payment?->payment_status == 'Success' ? 'selected' : '' }}>
                                        {{ __('Success') }}</option>
                                    <option value="rejected"
                                        {{ $enroll->payment?->payment_status == 'Rejected' ? 'selected' : '' }}>
                                        {{ __('Rejected') }}</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <x-admin.update-button :text="__('Update')"></x-admin.update-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script>
        'use strict';

        function deleteData(id) {
            let url = '{{ route('admin.workout.enrollment.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);

            $("#deleteModal").modal('show');
        }
    </script>
@endpush
