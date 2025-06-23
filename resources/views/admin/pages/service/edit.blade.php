@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Service') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit Service') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Service List') => 'admin.service.index',
                __('Edit Service') => '#',
            ]" />
            <div class="section-body row">
                @php
                    $languages = allLanguages();
                    $code = request('code') ?? $languages->first()->code;
                @endphp
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3 service_card">{{ __('Available Translations') }}</h5>
                            @if ($code !== $languages->first()->code && checkAdminHasPermission('service.translate'))
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
                                                href="{{ route('admin.service.edit', ['service' => $service->id, 'code' => $language->code]) }}"><i
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
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Service') }}</h4>
                                <div>
                                    <a href="{{ route('admin.service.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.service.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="code" value="{{ $code }}">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-2">{{ __('Service') }}</h4>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                                    <input type="text" id="title" class="form-control" name="title"
                                                        value="{{ old('title', $service->getTranslation($code)?->title) }}"
                                                        data-translate="true">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                @if ($code == $languages->first()->code)
                                                    <div class="form-group col-12">
                                                        <label>{{ __('Slug') }} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="slug" class="form-control"
                                                            name="slug" value="{{ old('slug', $service->slug) }}">
                                                        @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <label>{{ __('Tags') }}</label>
                                                        <input type="text" class="form-control tags" name="tags"
                                                            value="{{ old('tags', $service->tags) }}">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label>{{ __('Download File') }}</label>
                                                        <input type="file" id="file" class="form-control"
                                                            name="file">
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label>{{ __('Status') }}</label>
                                                        <select class="form-select" name="status">
                                                            <option value="1"
                                                                @if ($service->status == 1) selected @endif>
                                                                {{ __('Active') }}</option>
                                                            <option value="0"
                                                                @if ($service->status == 0) selected @endif>
                                                                {{ __('Inactive') }}</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                @endif
                                                <div class="form-group col-12">
                                                    <label>{{ __('Short Description') }}</label>
                                                    <textarea id="short_description" class="form-control height_80" name="short_description" rows="3"
                                                        data-translate="true">{{ old('short_description', $service->getTranslation($code)?->short_description) }}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>{{ __('Description') }}</label>
                                                    <textarea id="description" class="form-control summernote" name="description" rows="3" data-translate="true">{{ old('description', $service->getTranslation($code)?->description) }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <x-admin.save-button :text="__('Save')" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    @if ($code == $languages->first()->code)
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="my-2">{{ __('Image Gallery') }}</h4>
                                                <div class="row">
                                                    <div class="form-group col-12 col-md-6">
                                                        <label>{{ __('Featured Image') }} <span
                                                                class="text-danger">*</span></label>
                                                        <div id="image_preview" class="image-preview w-100"
                                                            @if ($service?->image) style="background-image: url({{ asset($service?->image) }}); background-size: cover; background-position: center center;" @endif>
                                                            <label for="image_upload"
                                                                id="image_label">{{ __('Image') }}</label>
                                                            <input type="file" name="image" id="image_upload">
                                                        </div>
                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    @if (Module::isEnabled('Media'))
                                                        <div class="form-group col-12">
                                                            <x-media::media-input name="images[]" multiple="yes"
                                                                label_text="Images" :dataImages="$service->imageArray" />
                                                        </div>
                                                    @endif
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
                                                        @foreach ($service->videos as $index => $video)
                                                            <div class="d-flex mt-2">
                                                                <input type="text" class="form-control"
                                                                    name="video_link[{{ $index }}]"
                                                                    value="{{ $video['link'] }}"
                                                                    placeholder="Video Link">
                                                                <input type="file"
                                                                    name="video_image[{{ $index }}]"
                                                                    class="form-control ms-2" placeholder="Video Image"
                                                                    accept="image/*">
                                                                @if ($loop->index != 0)
                                                                    <button
                                                                        class="btn btn-danger btn-link remove_link ms-2"
                                                                        type="button">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="my-2">
                                                    <span>
                                                        {{ __('Faqs') }}
                                                    </span>
                                                    <button class="btn btn-primary btn-faqs text-white btn-sm"
                                                        type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Question') }}</th>
                                                            <th>{{ __('Answer') }}</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($service->faqs as $faq)
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" name="faq_id[]"
                                                                        value="{{ $faq['id'] }}">
                                                                    <input type="text" class="form-control"
                                                                        name="question[]" value="{{ $faq['question'] }}"
                                                                        placeholder="Question">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="answer[]" value="{{ $faq['answer'] }}"
                                                                        placeholder="Answer">
                                                                </td>
                                                                <td>
                                                                    @if ($loop->index != 0)
                                                                        <button class="btn btn-danger btn-remove-faqs"
                                                                            type="button">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
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



{{-- Media Js --}}


{{-- Media Css --}}
@push('css')
    @if (Module::isEnabled('Media'))
        @stack('media_libary_css')
    @endif
@endpush

@if ($code == $languages->first()->code)
    @push('js')
        <script>
            'use strict'

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
            $(document).on('click', '.btn-remove-faqs', function() {
                $(this).parent().parent().remove();
            });
            $('.btn-faqs').on('click', function() {
                $('tbody').append(`
                <tr>
                    <td>
                        <input type="text" class="form-control" name="question[]" placeholder="Question">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="answer[]" placeholder="Answer">
                    </td>
                    <td>
                        <button class="btn btn-danger btn-remove-faqs" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            `);
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
