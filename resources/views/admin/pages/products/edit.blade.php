@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Product') }}</title>
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
                <h1>{{ __('Edit Product') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.product.index') }}">{{ __('Product List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Product') }}</div>
                </div>
            </div>
            <div class="section-body row">
                @php
                    $languages = allLanguages();
                    $code = request('code') ?? $languages->first()->code;
                @endphp
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3 service_card">{{ __('Available Translations') }}</h5>
                            @if ($code !== $languages->first()->code && checkAdminHasPermission('product.translate'))
                                <hr>
                                <button onclick="translateAll()" class="btn btn-primary"
                                    id="translate-btn">{{ __('Translate') }}</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="lang_list_top">
                                <ul class="lang_list">
                                    @foreach ($languages as $language)
                                        <li><a id="{{ $code == $language->code ? 'selected-language' : '' }}"
                                                href="{{ route('admin.product.edit', ['product' => $product->id, 'code' => $language->code]) }}"><i
                                                    class="fas {{ $code == $language->code ? 'fa-eye' : 'fa-edit' }}"></i>
                                                {{ $language->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-2 alert alert-danger" role="alert">
                                @php
                                    $current_language = $languages->where('code', $code)->first();
                                @endphp
                                <p>{{ __('Your editing mode') }} :
                                    <b>{{ $current_language?->name }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Product') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product.update', $product) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="lang_code" value="{{ request()->code }}">
                                    <div class="row">
                                        <div class="col-md-8 row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ old('name', $product?->getTranslation($code)?->name) }}"
                                                        data-translate="true">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            @if ($code == $languages->first()->code)
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="slug">{{ __('Slug') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="slug" name="slug"
                                                            value="{{ old('slug', $product->slug) }}" class="form-control">
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
                                                            <input type="text" name="sku"
                                                                class="form-control currency" id="sku"
                                                                value="{{ old('sku', $product->sku) }}">
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
                                                        <label for="price">{{ __('Price') }}
                                                            ({{ currency_icon() }})<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="price" class="form-control"
                                                            id="price"
                                                            value="{{ old('price', remove_comma($product->price)) }}">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="discount">{{ __('Discount') }}</label>
                                                        <input type="number" name="discount" class="form-control"
                                                            id="discount"
                                                            value="{{ old('discount', remove_comma($product->discount)) }}">
                                                        @error('discount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="discount_type">{{ __('Discount Type') }}</label>
                                                        <select name="discount_type" id="discount_type"
                                                            class="form-select">
                                                            <option value="fixed"
                                                                @if ($product->discount_type == 'fixed') selected @endif>
                                                                {{ __('Fixed') }}</option>
                                                            <option value="percent"
                                                                @if ($product->discount_type == 'percent') selected @endif>
                                                                {{ __('Percent') }}</option>
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
                                                            value="{{ old('quantity', remove_comma($product->stock)) }}">
                                                        @error('quantity')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">{{ __('Short Description') }} </label>
                                                    <textarea name="short_description" id="" cols="30" rows="10" class="form-control text-area-5"
                                                        data-translate="true">{{ old('short_description', $product?->getTranslation($code)?->short_description) }}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }} <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="summernote"
                                                        data-translate="true">{!! old('description', $product?->getTranslation($code)?->description) !!}</textarea>
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
                                                        class="summernote" data-translate="true">{!! old('additional_information', $product?->getTranslation($code)?->additional_information) !!}</textarea>
                                                    @error('additional_information')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 row">
                                            <div class="card">
                                                <div class="card-body">

                                                    @if ($code == $languages->first()->code)
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Image') }}</label>
                                                                <div id="preview" class="image-preview"
                                                                    @if (!empty($product->image)) style="background-image: url({{ asset($product->image) }}); background-size: cover; background-position: center center;" @endif>
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
                                                                <select name="status" id="status"
                                                                    class="form-select">
                                                                    <option value="1"
                                                                        @if ($product->status == 1) selected @endif>
                                                                        {{ __('Active') }}</option>
                                                                    <option value="0"
                                                                        @if ($product->status == 0) selected @endif>
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
                                                                            @if ($tax->id == $product->tax_id) selected @endif>
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
                                                                    <option value="">{{ __('Select Categories') }}
                                                                    </option>
                                                                    @foreach ($categories as $cat)
                                                                        <option value="{{ $cat->id }}"
                                                                            @if (in_array($cat->id, $productCategories)) selected @endif>
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
                                                                    <option value="" disabled>
                                                                        {{ __('Select Brand') }}
                                                                    </option>
                                                                    @foreach ($brands as $brand)
                                                                        <option value="{{ $brand->id }}"
                                                                            @if ($product->brand_id == $brand->id) selected @endif>
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
                                                                    <option value="0"
                                                                        @if ($product->is_warranty == 0) selected @endif>
                                                                        {{ __('No') }}</option>
                                                                    <option value="1"
                                                                        @if ($product->is_warranty == 1) selected @endif>
                                                                        {{ __('Yes') }}</option>
                                                                </select>
                                                                @error('is_warranty')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-md-12 warranty_duration {{ $product->is_warranty == 0 && 'd-none' }}">
                                                            <div class="form-group">
                                                                <label>{{ __('Warranty Duration') }} <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="warranty_duration"
                                                                    class="form-control"
                                                                    @if (!$product->warranty_duration) disabled @endif
                                                                    value="{{ $product->warranty_duration }}" />
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
                                                                    <option value="0"
                                                                        @if ($product->is_returnable == 0) selected @endif>
                                                                        {{ __('No') }}</option>
                                                                    <option value="1"
                                                                        @if ($product->is_returnable == 1) selected @endif>
                                                                        {{ __('Yes') }}</option>
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
                                                                    name="tags" value="{{ $product->tags }}">
                                                                @error('tags')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.update-button :text="__('Update')">
                                            </x-admin.update-button>
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




@if ($code == $languages->first()->code)
    @push('js')
        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {
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
@else
    @push('js')
        <script>
            "use strict";
            var isTranslatingInputs = true;

            function translateOneByOne(inputs, index = 0) {
                if (index >= inputs.length) {
                    if (isTranslatingInputs) {
                        isTranslatingInputs = false;
                        translateAllTextarea();
                    }
                    $('#translate-btn').prop('disabled', false);
                    $('#update-btn').prop('disabled', false);
                    return;
                }

                var $input = $(inputs[index]);
                var inputValue = $input.val();

                if (inputValue) {
                    $.ajax({
                        url: "{{ route('admin.languages.update.single') }}",
                        type: "POST",
                        data: {
                            lang: '{{ $code }}',
                            text: inputValue,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            $input.prop('disabled', true);
                            iziToast.show({
                                timeout: false,
                                close: true,
                                theme: 'dark',
                                icon: 'loader',
                                iconUrl: 'https://hub.izmirnic.com/Files/Images/loading.gif',
                                title: "{{ __('Translation Processing, please wait...') }}",
                                position: 'center',
                            });
                        },
                        success: function(response) {
                            $input.val(response);
                            // check input is tinymce and set content
                            if ($input.hasClass('summernote')) {
                                console.log($input);
                                var inputId = $input.attr('id');
                                tinymce.get(inputId).setContent(response);
                            }
                            $input.prop('disabled', false);
                            iziToast.destroy();
                            toastr.success("{{ __('Translated Successfully!') }}");
                            translateOneByOne(inputs, index + 1);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus, errorThrown);
                            iziToast.destroy();
                            toastr.error('Error', 'Error');
                        }
                    });
                } else {
                    translateOneByOne(inputs, index + 1);
                }
            }

            function translateAll() {
                iziToast.question({
                    timeout: 20000,
                    close: false,
                    overlay: true,
                    displayMode: 'once',
                    id: 'question',
                    zindex: 999,
                    title: "{{ __('This will take a while!') }}",
                    message: "{{ __('Are you sure?') }}",
                    position: 'center',
                    buttons: [
                        ["<button><b>{{ __('YES') }}</b></button>", function(instance, toast) {
                            $('#translate-btn').prop('disabled', true);
                            $('#update-btn').prop('disabled', true);

                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                            var inputs = $('input[data-translate="true"]').toArray();
                            translateOneByOne(inputs);

                        }, true],
                        ["<button>{{ __('NO') }}</button>", function(instance, toast) {

                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');

                        }],
                    ],
                    onClosing: function(instance, toast, closedBy) {},
                    onClosed: function(instance, toast, closedBy) {}
                });
            };

            function translateAllTextarea() {
                var inputs = $('textarea[data-translate="true"]').toArray();
                if (inputs.length === 0) {
                    return;
                }
                translateOneByOne(inputs);
            }

            $(document).ready(function() {
                var selectedTranslation = $('#selected-language').text();
                var btnText = "{{ __('Translate to') }}" + selectedTranslation;
                $('#translate-btn').text(btnText);
            });
        </script>
    @endpush
@endif
