@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Attribute') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Attribute') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.attribute.index') }}">{{ __('Attribute List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Attribute') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Attribute') }}</h4>
                                <div>
                                    <a href="{{ route('admin.attribute.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.attribute.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-2">
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

                                        <div class="col-md-12 row d-flex justify-content-center align-items-center">
                                            <div class="col-8">
                                                <h2 class="section-title">{{ __('Attribute Values') }}</h2>
                                            </div>
                                            <div class="col-4 d-flex justify-content-center">
                                                <button type="button"
                                                    class="btn btn-primary btn-sm add-values">{{ __('Add Values') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 row offset-md-2 values-container">
                                            <div class="form-group col-12">
                                                <input type="text" name="values[]" class="form-control" id="values"
                                                    required placeholder="Value 1">
                                                @error('values')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

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
                $('.add-values').on('click', function() {
                    let html = '';
                    // count of input fields
                    let count = $('.values-container').find('.form-group').length;
                    html += `<div class="form-group col-12">
                                <div class="d-flex justify-content-between">
                                    <input type="text" name="values[]" class="form-control" id="values"
                                    required placeholder="Value ${count + 1}">
                                    <button type="button" class="btn btn-danger btn-sm remove-values ms-2"><i class="fas fa-trash"></i></button>
                                </div>
                                @error('values')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>`;
                    $('.values-container').append(html)
                })
                $('.values-container').on('click', '.remove-values', function() {
                    $(this).closest('.form-group').remove();
                });
            });
        })(jQuery);
    </script>
@endpush
