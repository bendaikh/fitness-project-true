@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Workout') }}</title>
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
                <h1>{{ __('Edit Workout') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.workout.index') }}">{{ __('Workout List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Workout') }}</div>
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
                            @if ($code !== $languages->first()->code && checkAdminHasPermission('workout.translate'))
                                <hr>
                                <button onclick="translateAll()" class="btn btn-primary"
                                    id="translate-btn">{{ __('Translate') }}</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="lang_list_top">
                                <ul class="lang_list">
                                    @foreach ($languages as $language)
                                        <li>
                                            <a id="{{ $code == $language->code ? 'selected-language' : '' }}"
                                                href="{{ route('admin.workout.edit', ['workout' => $workout->id, 'code' => $language->code]) }}"><i
                                                    class="fas {{ $code == $language->code ? 'fa-eye' : 'fa-edit' }}"></i>
                                                {{ $language->name }}
                                            </a>
                                        </li>
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
                                <h4>{{ __('Edit Workout') }}</h4>
                                <div>
                                    <a href="{{ route('admin.workout.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.workout.update', $workout->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="code" value="{{ request()->code }}">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Title') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ old('name', $workout->getTranslation($code)?->name) }}"
                                                        data-translate="true">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($code == $languages->first()->code)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="slug">{{ __('Slug') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="slug" name="slug"
                                                            value="{{ old('slug', $workout->slug) }}"
                                                            placeholder="{{ __('Slug') }}" class="form-control">
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
                                                            id="capacity"
                                                            value="{{ old('capacity', $workout->capacity) }}">
                                                        @error('capacity')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price">{{ __('Price') }}
                                                            ({{ currency_icon() }})<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="price" class="form-control"
                                                            id="price" value="{{ old('price', $workout->price) }}">
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
                                                            value="{{ old('enroll_start', $workout->enroll_start) }}"
                                                            autocomplete="off">
                                                        @error('enroll_start')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="enroll_end">{{ __('Enroll End') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="enroll_end"
                                                            class="form-control datepicker" id="enroll_end"
                                                            value="{{ old('enroll_end', $workout->enroll_end) }}"
                                                            autocomplete="off">
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
                                                            id="training_days"
                                                            value="{{ old('training_days', $workout->training_days) }}">
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
                                                            id="class_count"
                                                            value="{{ old('class_count', $workout->class_count) }}">
                                                        @error('class_count')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">{{ __('Short Description') }} <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="short_description" id="" cols="30" rows="10" class="summernote"
                                                        data-translate="true">{!! old('short_description', $workout->getTranslation($code)?->short_description) !!}</textarea>
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
                                                        data-translate="true">{{ old('description', $workout->getTranslation($code)?->description) }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($code == $languages->first()->code)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body row">
                                                <div class="form-group col-12">
                                                    <label>{{ __('Featured Image') }}<span
                                                            class="text-danger">*</span></label>
                                                    <div id="image_preview" class="image-preview w-100"
                                                        @if ($workout?->image) style="background-image: url({{ asset($workout?->image) }}); background-size: cover; background-position: center center;" @endif>
                                                        <label for="image_upload"
                                                            id="image_label">{{ __('Image') }}</label>
                                                        <input type="file" name="image" id="image_upload"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                                @if (Module::isEnabled('Media'))
                                                    <div class="form-group col-12">
                                                        <x-media::media-input name="images[]" multiple="yes"
                                                            label_text="Images" :dataImages="$workout->imageArray" />
                                                    </div>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="status">{{ __('Status') }}<span
                                                                class="text-danger">*</span></label>
                                                        <select name="status" id="status" class="form-select">
                                                            <option value="1"
                                                                @if ($workout->status == 1) selected @endif>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                @if ($workout->status == 0) selected @endif>
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
                                                            value="{{ old('class_start_date', $workout->class_start_date) }}"
                                                            autocomplete="off">
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
                                                    <button class="btn btn-primary btn-link text-white btn-sm"
                                                        type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </h4>
                                                <div class="row">
                                                    <div class="form-group col-12 link_container">
                                                        @if ($workout->videos)
                                                            @foreach ($workout->videos as $index => $video)
                                                                <div class="d-flex mt-2">
                                                                    <input type="text" class="form-control"
                                                                        name="video_link[{{ $index }}]"
                                                                        value="{{ $video['link'] }}"
                                                                        placeholder="Video Link">
                                                                    <input type="file"
                                                                        name="video_image[{{ $index }}]"
                                                                        class="form-control ms-2"
                                                                        placeholder="Video Image" accept="image/*">
                                                                    @if ($loop->index != 0)
                                                                        <button
                                                                            class="btn btn-danger btn-link remove_link ms-2"
                                                                            type="button">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
        </section>
    </div>

    {{-- Media Modal Show --}}
    @if (Module::isEnabled('Media'))
        @stack('media_list_html')
    @endif
@endsection



@if ($code == $languages->first()->code)

    @push('js')
        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {

                    $('.btn-link').on('click', function() {

                        let index = $('.link_container').children().length;
                        $('.link_container').append(`
                        <div class="d-flex mt-2">
                            <input type="text" class="form-control" name="video_link[${index}]" placeholder="Video Link">
                            <input type="file" name="video_image[${index}]" class="form-control ms-2" placeholder="Video Image" accept="image/*">
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


{{-- Media Css --}}
@push('css')
    @if (Module::isEnabled('Media'))
        @stack('media_libary_css')
    @endif
@endpush
