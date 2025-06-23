@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Workout') }}</title>
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
                <h1>{{ __('Create Workout') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.workout.index') }}">{{ __('Workout List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Workout') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Workout') }}</h4>
                                <div>
                                    <a href="{{ route('admin.workout.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.workout.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Title') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="capacity">{{ __('Capacity') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="capacity" class="form-control"
                                                        id="capacity" value="{{ old('capacity') }}">
                                                    @error('capacity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="enroll_start">{{ __('Enroll Start') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="enroll_start"
                                                        class="form-control datepicker" id="enroll_start"
                                                        value="{{ old('enroll_start') }}" autocomplete="off">
                                                    @error('enroll_start')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="enroll_end">{{ __('Enroll End') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="enroll_end" class="form-control datepicker"
                                                        id="enroll_end" value="{{ old('enroll_end') }}" autocomplete="off">
                                                    @error('enroll_end')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="training_days">{{ __('Training Duration') }}({{ __('Day') }})<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="training_days" class="form-control"
                                                        id="training_days" value="{{ old('training_days') }}">
                                                    @error('training_days')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="class_count">{{ __('Number of Classes') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="class_count" class="form-control"
                                                        id="class_count" value="{{ old('class_count') }}">
                                                    @error('class_count')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">{{ __('Short Description') }} <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="short_description" id="" cols="30" rows="10" class="summernote">{!! old('short_description') !!}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }} <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="summernote">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="form-group col-12">
                                                <label>{{ __('Featured Image') }}<span
                                                            class="text-danger">*</span></label>
                                                <div id="image_preview" class="image-preview w-100">
                                                    <label for="image_upload"
                                                        id="image_label">{{ __('Image') }}</label>
                                                    <input type="file" name="image" id="image_upload"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            @if (Module::isEnabled('Media'))
                                                <div class="form-group col-12">
                                                    <x-media::media-input name="images[]" multiple="yes"
                                                        label_text="Images" />
                                                </div>
                                            @endif
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
                                                    <label for="class_start_date">{{ __('Class Start Date') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="class_start_date"
                                                        class="form-control datepicker" id="class_start_date"
                                                        value="{{ old('class_start_date') }}" autocomplete="off">
                                                    @error('class_start_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-2">
                                                <span>
                                                    {{ __('Video Gallery') }}
                                                </span>
                                                <button class="btn btn-primary btn-link text-white btn-sm" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </h4>
                                            <div class="row">
                                                <div class="form-group col-12 link_container">
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" name="video_link[]"
                                                            value="" placeholder="Video Link">
                                                        <input type="file" name="video_image[]"
                                                            class="form-control ms-2" placeholder="Video Image"
                                                            accept="image/*">
                                                    </div>
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
        </section>
    </div>

    {{-- Media Modal Show --}}
    @if (Module::isEnabled('Media'))
        @stack('media_list_html')
    @endif
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
                $('.btn-link').on('click', function() {
                    $('.link_container').append(`
                        <div class="d-flex mt-2">
                            <input type="text" class="form-control" name="video_link[]" placeholder="Video Link">
                            <input type="file" name="video_image[]" class="form-control ms-2" placeholder="Video Image">
                            <button class="btn btn-danger btn-link remove_link ms-2" type="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `);
                });
                $(document).on('click', '.remove_link', function() {
                    $(this).parent().remove();
                });
                $.uploadPreview({
                    input_field: "#image_upload",
                    preview_box: "#image_preview",
                    label_field: "#image_label",
                    label_default: "{{ __('Choose Image') }}",
                    label_selected: "{{ __('Change Image') }}",
                    no_label: false,
                    success_callback: null
                });
            });

        })(jQuery);
    </script>

    @if (Module::isEnabled('Media'))
        @stack('media_libary_js')
    @endif
@endpush

{{-- Media Css --}}
@push('css')
    @if (Module::isEnabled('Media'))
        @stack('media_libary_css')
    @endif
@endpush
