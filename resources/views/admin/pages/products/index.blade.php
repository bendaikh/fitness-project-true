@extends('admin.master_layout')
@section('title')
    <title>{{ __('Product List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Product List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Product List') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    {{-- Search filter  start --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="{{ route('admin.product.index') }}" method="GET" onchange="this.submit()">
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
                                <x-admin.form-title :text="__('Product List')" />
                                @adminCan('product.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.product.create')" text="{{ __('Add Product') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="30%">{{ __('Name') }}</th>
                                                <th width="10%">{{ __('Price') }}</th>
                                                <th width="10%">{{ __('Discount') }}</th>
                                                <th width="15%">{{ __('Photo') }}</th>
                                                <th width="10%">{{ __('Status') }}</th>
                                                <th width="15%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $index => $product)
                                                <tr>
                                                    <td>{{ $products->firstItem() + $index }}</td>
                                                    <td>{{ $product->name }}
                                                    </td>
                                                    <td>{{ currency($product->price) }}</td>
                                                    <td>
                                                        @if ($product->discount_type == 'percent')
                                                            {{ $product->discount }}%
                                                        @else
                                                            {{ currency($product->discount) }}
                                                        @endif
                                                    </td>
                                                    <td> <img class="rounded-circle" src="{{ asset($product->image_url) }}"
                                                            alt="" width="100px" height="100px"></td>
                                                    <td>
                                                        @if ($product->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeProductStatus({{ $product->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeProductStatus({{ $product->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('product.edit')
                                                                <a href="{{ route('admin.product.edit', ['product' => $product->id, 'code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('product.delete')
                                                                <button type="button" data-bs-toggle="modal"
                                                                    @if ($product->orders->count() > 0) data-bs-target="#canNotDeleteModal"
                                                                @else
                                                                data-bs-target="#deleteModal" onclick="deleteData({{ $product->id }})" @endif
                                                                    class="btn btn-danger btn-sm me-2">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @endadminCan
                                                            @if (checkAdminHasPermission('product.gallery') ||
                                                                    checkAdminHasPermission('product.related.product.view') ||
                                                                    checkAdminHasPermission('product.variant.view'))
                                                                <div class="dropdown d-inline">
                                                                    <button class="btn btn-primary btn-sm dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton2"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="fas fa-cog"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-style"
                                                                        x-placement="top-start">
                                                                        @adminCan('product.gallery')
                                                                            <a class="dropdown-item has-icon"
                                                                                href="{{ route('admin.product-gallery', $product->id) }}"><i
                                                                                    class="far fa-image"></i>
                                                                                {{ __('Image Gallery') }}</a>
                                                                        @endadminCan
                                                                        @adminCan('product.related.product.view')
                                                                            <a class="dropdown-item has-icon"
                                                                                href="{{ route('admin.related-products', $product->id) }}"><i
                                                                                    class="fas fa-lightbulb"></i>
                                                                                {{ __('Related Products') }}</a>
                                                                        @endadminCan
                                                                        @adminCan('product.variant.view')
                                                                            <a class="dropdown-item has-icon"
                                                                                href="{{ route('admin.product-variant', $product->id) }}"><i
                                                                                    class="fas fa-cog"></i>
                                                                                {{ __('Product Variant') }}
                                                                            </a>
                                                                        @endadminCan
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Product')" route='admin.product.create'
                                                    create="yes" :message="__('No data found!')" colspan="7">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $products->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {{ __('You can not delete this product. Because there are one or more order has been created in this product.') }}
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

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.product.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function changeProductStatus(id) {
            var id = id;
            var url = '{{ route('admin.product.status', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'POST',
                success: function(data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                    }
                },
                error: function(error) {
                    handleFetchError(error);
                }
            })
        }
    </script>
@endpush
