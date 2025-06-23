@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Slider') }}</title>
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

            <x-admin.breadcrumb title="{{ __('Edit Slider') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Slider List') => route('admin.slider.list'),
                __('Edit Slider') => '#',
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
                            @if ($code !== $languages->first()->code)
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
                                                href="{{ route('admin.slider.edit', ['home' => $home, 'code' => $language->code]) }}"><i
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
                        <form action="{{ route('admin.home-slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="code" value="{{ $code }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-2">
                                                <span>
                                                    {{ __('Slider') }}
                                                </span>
                                                <button class="btn btn-primary slider-btn-link text-white btn-sm"
                                                    type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="slider_container">
                                        @include('components.admin.slider-item', [
                                            'home' => $home,
                                            'sliders' => $sliders,
                                        ])
                                    </div>
                                    <div class="row">
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.update-button :text="__('Update')">
                                            </x-admin.update-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                    $('.slider-btn-link').on('click', function() {
                        var slider = $('.slider_container > .row').html();
                        var row_count = $('.slider_container').find('.row').length;
                        row_count = row_count + 1;
                        const home = '{{ $home }}';
                        const sliders = @json($sliders);
                        const last_slider = sliders[sliders.length - 1];
                        let slider_count = last_slider ? last_slider.id + 1 : row_count;
                        var slider_html = `
                        <div class="card">
                            <div class="card-header">
                                    <h1>Slider ${row_count}</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end mb-3">
                                        <button class="btn btn-danger btn-link remove_slider ms-2" type="button">
                                            <i class="fas fa-times"></i>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="slider_title[${slider_count}]" value="{{ old('slider_title[${slider_count}]') }}"
                                                placeholder="Slider Title">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="file" name="slider_image[${slider_count}]" class="form-control ms-2" placeholder="Slider Image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="slider_subtitle_1[${slider_count}]" value="{{ old('slider_subtitle_1[${slider_count}]') }}"
                                                placeholder="Slider Sub Title 1">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="slider_subtitle_2[${slider_count}]" value="{{ old('slider_subtitle_2[${slider_count}]') }}"
                                                placeholder="Slider Sub Title 2">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="button_text[${slider_count}]" value="{{ old('button_text[${slider_count}]') }}"
                                                placeholder="Button Text">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="button_link[${slider_count}]" value="{{ old('button_link[${slider_count}]') }}"
                                                placeholder="Button Link">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control icp icp-auto"
                                                name="button_icon[${slider_count}]"
                                                value="{{ old('button_icon[${slider_count}]', 'fab fa-whatsapp') }}"
                                                placeholder="Button Icon">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="home_page" id="" class="form-control">
                                                <option value="${home}">Home Page ${home}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="order[${slider_count}]"
                                                value="${slider_count}" placeholder="Order">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <select name="status[${slider_count}]" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                        $('.slider_container').append(slider_html);
                        $('.icp-auto').iconpicker();
                    });
                    $(document).on('click', '.remove_slider', function() {
                        $(this).closest('.card').remove();
                    });
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
