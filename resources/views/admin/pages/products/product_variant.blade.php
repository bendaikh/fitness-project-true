@extends('admin.master_layout')
@section('title')
    <title>{{ __('Product Variant List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Product Variant List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Product List') => route('admin.product.index'),
                __('Product Variant List') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Product Variant List')" />
                                @adminCan('product.variant.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.product-variant.create', $product->id)" text="Add Product Variant" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="15%">{{ __('Sku') }}</th>
                                                <th width="10%">{{ __('Price') }}</th>
                                                <th width="30%">{{ __('Attributes') }}</th>
                                                <th width="15%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($variants as $index => $variant)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $variant['sku'] }}</td>
                                                    <td>{{ $variant['price'] }}</td>
                                                    <td>
                                                        @foreach ($variant['attributes'] as $attr)
                                                            {{ $attr['attribute_value'] }} @if (!$loop->last)
                                                                {{ __(' , ') }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('product.variant.edit')
                                                                <a href="{{ route('admin.product-variant.edit', $variant['id']) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('product.variant.delete')
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal"
                                                                    onclick="deleteData({{ $variant['id'] }})"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Product Variant')" route='admin.product.create' create="no"
                                                    :message="__('No data found!')" colspan="7">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
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
            var url = '{{ route('admin.product-variant.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }
    </script>
@endpush
