@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Product') }}</title>
@endsection

@push('css')
    <style>
        .tagify.form-control.tags {
            height: auto;
        }

        .tag {
            padding-top: 5px;
        }
    </style>
@endpush
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Product') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.product.index') }}">{{ __('Product List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Product') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Product') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="slug">{{ __('Slug') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="slug" name="slug"
                                                        value="{{ old('slug') }}" class="form-control">
                                                    @error('slug')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="sku">{{ __('SKU') }}<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" name="sku" class="form-control currency"
                                                            id="sku" value="{{ old('sku') }}">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text sku_generate">
                                                                <i class="fas fa-barcode"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('sku')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="price">{{ __('Price') }} ({{ currency_icon() }})<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="price" class="form-control" id="price"
                                                        value="{{ old('price') }}">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="discount">{{ __('Discount') }}</label>
                                                    <input type="number" name="discount" class="form-control"
                                                        id="discount" value="{{ old('discount') }}">
                                                    @error('discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="discount_type">{{ __('Discount Type') }}</label>
                                                    <select name="discount_type" id="discount_type" class="form-select">
                                                        <option value="fixed">{{ __('Fixed') }}</option>
                                                        <option value="percent">{{ __('Percent') }}</option>
                                                    </select>
                                                    @error('discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __('Stock Quantity') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" name="quantity"
                                                        value="{{ old('quantity') }}">
                                                    @error('quantity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">{{ __('Short Description') }} </label>
                                                    <textarea name="short_description" id="" cols="30" rows="10" class="form-control text-area-5">{!! old('short_description') !!}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }} <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="summernote" data-translate="true">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label
                                                        for="additional_information">{{ __('Additional Information') }}</label>
                                                    <textarea name="additional_information" id="additional_information" cols="30" rows="10"
                                                        class="summernote" data-translate="true">{{ old('additional_information') }}</textarea>
                                                    @error('additional_information')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>{{ __('Image') }}</label>
                                                            <div id="preview" class="image-preview">
                                                                <label for="upload"
                                                                    id="label">{{ __('Image') }}</label>
                                                                <input type="file" name="image" id="upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="status">{{ __('Status') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option value="1">
                                                                    {{ __('Active') }}</option>
                                                                <option value="0">
                                                                    {{ __('Inactive') }}</option>
                                                            </select>
                                                            @error('status')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tax">{{ __('Tax') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select name="tax_id" id="tax"
                                                                class="form-select select2">
                                                                <option value="" disabled>{{ __('Select Tax') }}
                                                                </option>
                                                                @foreach ($taxes as $tax)
                                                                    <option value="{{ $tax->id }}"
                                                                        @if ($tax->rate == 0) selected @endif>
                                                                        {{ $tax->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('tax_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="categories">{{ __('Categories') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select name="categories[]" id="categories"
                                                                class="form-select select2">
                                                                <option value="" selected disabled>
                                                                    {{ __('Select Categories') }}
                                                                </option>
                                                                @foreach ($categories as $cat)
                                                                    <option value="{{ $cat->id }}">
                                                                        {{ $cat->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('categories')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="brand_id">{{ __('Brands') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select name="brand_id" id="brand_id"
                                                                class="form-select select2">
                                                                <option value="" disabled selected>
                                                                    {{ __('Select Brand') }}</option>
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>{{ __('Warranty Available ?') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="is_warranty" class="form-select">
                                                                <option value="0">{{ __('No') }}</option>
                                                                <option value="1">{{ __('Yes') }}</option>
                                                            </select>
                                                            @error('is_warranty')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 d-none warranty_duration">
                                                        <div class="form-group">
                                                            <label>{{ __('Warranty Duration') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="warranty_duration"
                                                                class="form-control" disabled />
                                                            @error('warranty_duration')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>{{ __('Product Return Availabe ?') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="is_returnable" class="form-select"
                                                                id="is_returnable">
                                                                <option value="0">{{ __('No') }}</option>
                                                                <option value="1">{{ __('Yes') }}</option>
                                                            </select>
                                                            @error('is_returnable')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tags">{{ __('Tags') }}</label>
                                                            <input type="text" class="form-control tags"
                                                                name="tags">
                                                            @error('tags')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.save-button :text="__('Save')">
                                            </x-admin.save-button>
                                        </div>
                                    </div>
                                </form>
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
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('[name="name"]').on('input', function() {
                    var name = $(this).val();
                    var slug = convertToSlug(name);
                    $("[name='slug']").val(slug);
                });
                $('[name="is_warranty"]').on('change', function() {
                    var is_warranty = $(this).val();
                    if (is_warranty == 1) {
                        $('[name="warranty_duration"]').attr('required', true);
                        $('.warranty_duration').removeClass('d-none')
                        $('[name="warranty_duration"]').removeAttr('disabled');
                    } else {
                        $('[name="warranty_duration"]').removeAttr('required');
                        $('[name="warranty_duration"]').attr('disabled');
                        $('.warranty_duration').addClass('d-none')
                    }

                })
                $('.sku_generate').on('click', function() {
                    var sku = Math.floor(10000000 + Math.random() * 90000000);
                    $('[name="sku"]').val(sku);

                })

                setupImagePreview('upload', 'preview');
            });
        })(jQuery);
    </script>
@endpush
