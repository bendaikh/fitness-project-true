@extends('admin.master_layout')
@section('title')
    <title>{{ __('Specialty List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Specialty List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Specialty List') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    {{-- Search filter --}}
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
                                                <option value="1" {{ request('order_by') == '1' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="0" {{ request('order_by') == '0' ? 'selected' : '' }}>
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
                                <x-admin.form-title :text="__('Specialty List')" />
                                @adminCan('specialty.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.specialty.create')" text="{{ __('Add Specialty') }}" />
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
                                            @forelse ($specialties as $index => $specialty)
                                                <tr>
                                                    <td>{{ $index + $specialties->firstItem() }}</td>
                                                    <td class="text-left">{{ $specialty->name }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('specialty.edit')
                                                                <a href="{{ route('admin.specialty.edit', ['specialty' => $specialty->id, 'lang_code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary me-2 btn-sm" data-toggle="tooltip"
                                                                    title="Edit"><i class="fas fa-edit"></i></a>
                                                            @endadminCan
                                                            @adminCan('specialty.edit')
                                                                @if ($specialty->trainers->count())
                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        class="btn btn-danger btn-sm"
                                                                        data-bs-target="#canNotDeleteModal"><i
                                                                            class="fas fa-trash"></i></a>
                                                                @else
                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        class="btn btn-danger btn-sm"
                                                                        data-bs-target="#deleteModal"
                                                                        onclick="deleteData({{ $specialty->id }})"><i
                                                                            class="fas fa-trash"></i></a>
                                                                @endif
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Specialty')" route='admin.specialty.create'
                                                    create="yes" :message="__('No data found!')" colspan="3">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $specialties->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {{ __('You can not delete this specialty. Because there are one or more trainers has been created in this specialty.') }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        'use strict';
        $(document).ready(function() {});

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ route('admin.specialty.destroy', '') }}' + "/" + id)
        }
    </script>
@endpush
