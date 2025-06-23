@extends('admin.master_layout')
@section('title')
    <title>{{ __('Brand List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Brand List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Brand List') => '#',
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
                    {{-- Search filter  end --}}
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Brand List')" />
                                @adminCan('product.brand.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.brand.create')" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL.') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th class="text-left">{{ __('Name') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($brands as $index => $brand)
                                                <tr>
                                                    <td>{{ $index + $brands->firstItem() }}</td>
                                                    <td><img src="{{ $brand->image_url }}" alt=""
                                                            class="img-fluid w-80px"></td>
                                                    <td class="text-left">{{ $brand->name }}</td>

                                                    <td>
                                                        @if ($brand->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $brand->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $brand->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('product.brand.edit')
                                                                <a href="{{ route('admin.brand.edit', ['brand' => $brand->id, 'code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary me-2 btn-sm" data-toggle="tooltip"
                                                                    title="Edit"><i class="fas fa-edit"></i></a>
                                                            @endadminCan
                                                            @adminCan('product.brand.delete')
                                                                <a href="javascript:;" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $brand->id }})"><i
                                                                        class="fas fa-trash"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Brand')" route='admin.brand.create' create="yes"
                                                    :message="__('No data found!')" colspan="6">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $brands->onEachSide(3)->links() }}
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

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ route('admin.brand.destroy', '') }}' + "/" + id)

            $("#deleteModal").modal('show')
        }

        function changeStatus(id) {
            var id = id;
            var url = '{{ route('admin.brand.status', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'PUT',
                success: function(data) {
                    toastr.success(data.message);
                },
                error: function(error) {
                    handleFetchError(error);
                }
            })
        }
    </script>
@endpush
