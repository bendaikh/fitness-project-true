@extends('admin.master_layout')
@section('title')
    <title>{{ __('Related Products') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Related Products') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Product List') => route('admin.product.index'),
                __('Related Products') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Related Products') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('Check') }}</th>
                                                <th width="15%">{{ __('Photo') }}</th>
                                                <th width="30%">{{ __('Name') }}</th>
                                                <th width="10%">{{ __('Price') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST"
                                                action ="{{ route('admin.store-related-products', $product->id) }}">
                                                @csrf
                                                @foreach ($products as $prod)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="product_id[]"
                                                                value="{{ $prod->id }}"
                                                                @if (in_array($prod->id, $relatedProducts)) checked @endif>
                                                        </td>
                                                        <td>
                                                            <img src="{{ asset($prod->image_url) }}"
                                                                alt="{{ $prod->name }}" class="img-thumbnail w-100px">
                                                        </td>
                                                        <td>{{ $prod->name }}</td>
                                                        <td>{{ currency($prod->actual_price) }}</td>
                                                    </tr>
                                                @endforeach

                                                {{-- save button --}}

                                                <tr>
                                                    <td colspan="4">
                                                        <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                                                    </td>
                                                </tr>
                                            </form>
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
@endsection


@push('js')
    <script>
        'use strict';
        $(document).ready(function() {});

        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.product.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }
    </script>
@endpush
