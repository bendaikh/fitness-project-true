@extends('admin.master_layout')
@section('title')
    <title>{{ __('Activity List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Activity List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Activity List') => '#',
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Activity List')" />
                                @adminCan('activity.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.activity.create')" text="{{ __('Add Activity') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL.') }}</th>
                                                <th class="text-left">{{ __('Name') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($activities as $index => $activity)
                                                <tr>
                                                    <td>{{ $index + $activities->firstItem() }}</td>
                                                    <td class="text-left">{{ $activity->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('activity.create')
                                                                <a href="{{ route('admin.activity.edit', ['activity' => $activity->id, 'lang_code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary me-2 btn-sm" data-toggle="tooltip"
                                                                    title="Edit"><i class="fas fa-edit"></i></a>
                                                            @endadminCan
                                                            @adminCan('activity.delete')
                                                                <a href="javascript:;" data-bs-target="#deleteModal"
                                                                    data-bs-toggle="modal" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $activity->id }})"><i
                                                                        class="fas fa-trash"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Activity')" route='admin.activity.create'
                                                    create="yes" :message="__('No data found!')" colspan="3">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $activities->onEachSide(3)->links() }}
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
            $("#deleteForm").attr("action", '{{ route('admin.activity.destroy', '') }}' + "/" + id)
        }
    </script>
@endpush
