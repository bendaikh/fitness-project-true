@extends('admin.master_layout')
@section('title')
    <title>{{ __('Other Section') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Other Section') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Other Section') }}</div>
                </div>
            </div>
            <div class="section-body row">
                <div class="col-12">
                    @php
                        $languages = allLanguages();
                        $code = request('code') ?? $languages->first()->code;
                    @endphp
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
                                        <li>
                                            <a id="{{ request('code') == $language->code ? 'selected-language' : '' }}"
                                                href="{{ route('admin.page-utility.index', ['code' => $language->code]) }}">
                                                <i
                                                    class="fas {{ request('code') == $language->code ? 'fa-eye' : 'fa-edit' }}"></i>
                                                {{ $language->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-2 alert alert-danger" role="alert">
                                @php
                                    $current_language = $languages->where('code', request()->get('code'))->first();
                                @endphp
                                <p>{{ __('Your editing mode') }}:<b> {{ $current_language?->name }}</b></p>
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
                                <h4>{{ __('Other Section') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        @include('admin.pages.other-pages.utility.section.sidebar')
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            @include('admin.pages.other-pages.utility.tabs.auth_section')
                                            @include('admin.pages.other-pages.utility.tabs.footer_section')
                                            @include('admin.pages.other-pages.utility.tabs.call_to_action_button_section')
                                            @if (isShopActive())
                                                @include('admin.pages.other-pages.utility.tabs.shop-page')
                                            @endif
                                            @include('admin.pages.other-pages.utility.tabs.trainer-page')
                                            @include('admin.pages.other-pages.utility.tabs.service-page')
                                            @include('admin.pages.other-pages.utility.tabs.award-page')
                                            @include('admin.pages.other-pages.utility.tabs.faq-page')
                                            @include('admin.pages.other-pages.utility.tabs.membership-page')
                                        </div>
                                    </div>
                                </div>
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
        <script src="{{ asset('backend/js/jquery.uploadPreview.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                "use strict";
                var activeTab = localStorage.getItem('activeTab');
                if (activeTab) {
                    $('#myTab4 a[href="#' + activeTab + '"]').tab('show');
                } else {
                    $('#myTab4 a:first').tab('show');
                }

                $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                    var newTab = $(e.target).attr('href').substring(1);
                    localStorage.setItem('activeTab', newTab);
                });
            });

            "use strict";
            $.uploadPreview({
                input_field: "#login-image-icon-upload",
                preview_box: "#login-image-icon-preview",
                label_field: "#login-image-icon-label",
                label_default: "{{ __('Choose login image') }}",
                label_selected: "{{ __('Change login image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#register-image-icon-upload",
                preview_box: "#register-image-icon-preview",
                label_field: "#register-image-icon-label",
                label_default: "{{ __('Choose register image') }}",
                label_selected: "{{ __('Change register image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#forget_password_image-upload",
                preview_box: "#forget_password_image-preview",
                label_field: "#forget_password_image-label",
                label_default: "{{ __('Choose Forget Password image') }}",
                label_selected: "{{ __('Change Forget Password image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#reset_password_image-upload",
                preview_box: "#reset_password_image-preview",
                label_field: "#reset_password_image-label",
                label_default: "{{ __('Choose Reset Password image') }}",
                label_selected: "{{ __('Change Reset Password image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#footer_payment_image-upload",
                preview_box: "#footer_payment_image-preview",
                label_field: "#footer_payment_image-label",
                label_default: "{{ __('Choose Footer Payment Image') }}",
                label_selected: "{{ __('Change Footer Payment Image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#restaurant_banner_image-upload",
                preview_box: "#restaurant_banner_image-preview",
                label_field: "#restaurant_banner_image-label",
                label_default: "{{ __('Choose Restaurant Banner Image') }}",
                label_selected: "{{ __('Change Restaurant Banner Image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#breadcrumb_section_image-upload",
                preview_box: "#breadcrumb_section_image-preview",
                label_field: "#breadcrumb_section_image-label",
                label_default: "{{ __('Choose Breadcrumb Section Image') }}",
                label_selected: "{{ __('Change Breadcrumb Section Image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#experience_image-upload",
                preview_box: "#experience_image-preview",
                label_field: "#experience_image-label",
                label_default: "{{ __('Choose Experience Image') }}",
                label_selected: "{{ __('Change Experience Image') }}",
                no_label: false,
                success_callback: null
            });
            $.uploadPreview({
                input_field: "#class_time_image-upload",
                preview_box: "#class_time_image-preview",
                label_field: "#class_time_image-label",
                label_default: "{{ __('Choose Class Time Image') }}",
                label_selected: "{{ __('Change Class Time Image') }}",
                no_label: false,
                success_callback: null
            });
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
