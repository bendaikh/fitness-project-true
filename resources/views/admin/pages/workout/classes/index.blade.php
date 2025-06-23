@extends('admin.master_layout')
@section('title')
    <title>{{ __('Class Schedule List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Class Schedule List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Class Schedule List') => '#',
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
                                <x-admin.form-title :text="__('Class Schedule List')" />
                                @adminCan('class.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.class.create')" text="{{ __('Add Class Schedule') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table member_table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th class="min_width">{{ __('Date') }}</th>
                                                <th class="min_width">{{ __('Start At') }}</th>
                                                <th class="min_width">{{ __('End At') }}</th>
                                                <th class="min_width">{{ __('Class') }}</th>
                                                <th class="min_width">{{ __('Workout') }}</th>
                                                <th class="min_width">{{ __('Instructor') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($classes as $index => $class)
                                                <tr>
                                                    <td>{{ $classes->firstItem() + $index }}</td>
                                                    <td class="min_width">{{ $class->date }}</td>
                                                    <td class="min_width">
                                                        {{ now()->parse($class->start_at)->format('H:i A') }}</td>
                                                    <td class="min_width">
                                                        {{ now()->parse($class->end_at)->format('H:i A') }}</td>
                                                    <td class="min_width">{{ $class->name }}</td>
                                                    <td class="min_width">{{ $class->workout->name }}</td>
                                                    <td class="min_width">
                                                        @foreach ($class->trainers->take(1) as $trainer)
                                                            <span>
                                                                {{ $trainer->user?->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if ($class->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $class->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $class->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('class.edit')
                                                                <a href="{{ route('admin.class.edit', ['class' => $class->id, 'code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary btn-sm me-2">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                </a>
                                                            @endadminCan
                                                            @adminCan('class.delete')
                                                                <a href="javascript:;" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $class->id }})"
                                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Class Schedule')" route='admin.class.create' create="yes"
                                                    :message="__('No data found!')" colspan="9">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $classes->onEachSide(3)->links() }}
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
            var url = '{{ route('admin.class.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function changeStatus(id) {
            $.ajax({
                url: "{{ route('admin.class.status', ':id') }}".replace(':id', id),
                type: "post",
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(error) {
                    handleFetchError(error)
                }
            });
        }
    </script>
@endpush
