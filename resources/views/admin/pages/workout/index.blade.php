@extends('admin.master_layout')
@section('title')
    <title>{{ __('Workout List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Workout List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Workout List') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    {{-- Search filter  start --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-3 form-group">
                                            <select name="status" id="status" class="form-select">
                                                <option value="">{{ __('Select Status') }}</option>
                                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}
                                                </option>
                                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                                    {{ __('In-Active') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-lg-3 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="asc"
                                                    {{ request('order_by') == 'asc' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="desc"
                                                    {{ request('order_by') == 'desc' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-lg-3 form-group">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Workout List')" />
                                @adminCan('workout.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.workout.create')" text="{{ __('Add Workout') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table member_table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th class="min_width" width="20%">{{ __('Title') }}</th>
                                                <th width="10%">{{ __('Capacity') }}</th>
                                                <th class="min_width" width="10%">{{ __('Total Classes') }}</th>
                                                <th class="min_width" width="10%">{{ __('Enroll Start') }}</th>
                                                <th class="min_width" width="10%">{{ __('Enroll End') }}</th>
                                                <th class="min_width" width="10%">{{ __('Price') }}</th>
                                                <th width="10%">{{ __('Status') }}</th>
                                                <th width="15%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($workouts as $index => $workout)
                                                <tr>
                                                    <td>{{ $workouts->firstItem() + $index }}</td>
                                                    <td class="min_width">{{ $workout->name }}</td>
                                                    <td class="min_width">{{ $workout->capacity }}</td>
                                                    <td>{{ $workout->training_days }}</td>
                                                    <td class="min_width">{{ $workout->enroll_start }}</td>
                                                    <td class="min_width">{{ $workout->enroll_end }}</td>
                                                    <td class="min_width">{{ currency($workout->price) }}</td>
                                                    <td>
                                                        @if ($workout->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $workout->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $workout->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            @adminCan('workout.edit')
                                                                <a href="{{ route('admin.workout.edit', ['workout' => $workout->id, 'code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary btn-sm me-2">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                </a>
                                                            @endadminCan
                                                            @adminCan('workout.delete')
                                                                <a href="javascript:;" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $workout->id }})"
                                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Workout')" route='admin.workout.create'
                                                    create="yes" :message="__('No data found!')" colspan="9">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $workouts->onEachSide(3)->links() }}
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
        $(document).ready(function() {});

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.workout.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ route('admin.workout.status', '') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function(err) {
                    handleFetchError(err);
                }
            });
        }
    </script>
@endpush
