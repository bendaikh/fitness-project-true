@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Class Schedule') }}</title>
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
                <h1>{{ __('Edit Class Schedule') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.class.index') }}">{{ __('Class Schedule List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Class Schedule') }}</div>
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
                            @if ($code !== $languages->first()->code && checkAdminHasPermission('class.translate'))
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
                                                href="{{ route('admin.class.edit', ['class' => $class->id, 'code' => $language->code]) }}"><i
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
                                <h4>{{ __('Edit Class Schedule') }}</h4>
                                <div>
                                    <a href="{{ route('admin.class.index') }}" class="btn btn-primary">
                                        <i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.class.update', $class->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="code" value="{{ request()->code }}">
                                    <div class="row">
                                        <div class="col-md-8 row">
                                            <div
                                                class="{{ $code == $languages->first()->code ? 'col-md-6' : 'col-md-12' }}">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Title') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ old('name', $class->getTranslation($code)?->name) }}"
                                                        data-translate="true">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if ($code == $languages->first()->code)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date">{{ __('Date') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="date" name="date"
                                                            value="{{ old('date', $class->date) }}"
                                                            class="form-control datepicker" autocomplete="off">
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="start_at">{{ __('Start At') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="start_at" name="start_at"
                                                            value="{{ old('start_at', $class->start_at) }}"
                                                            class="form-control clockpicker">
                                                        @error('start_at')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="end_at">{{ __('End At') }}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" id="end_at" name="end_at"
                                                            value="{{ old('end_at', $class->end_at) }}"
                                                            class="form-control clockpicker">
                                                        @error('end_at')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }}</label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="summernote" data-translate="true">{{ old('description', $class->getTranslation($code)?->description) }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            @if ($code == $languages->first()->code)
                                                <div class="card">
                                                    <div class="card-body row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="room">{{ __('Room') }}</label>
                                                                <input type="text" name="room" class="form-control"
                                                                    id="room"
                                                                    value="{{ old('room', $class->room) }}">
                                                                @error('room')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="workout_id">{{ __('Workout') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="workout_id" id="workout_id"
                                                                    class="form-select select2">
                                                                    <option value='' disabled>
                                                                        {{ __('Select Workout') }}
                                                                    </option>
                                                                    @foreach ($workouts as $workout)
                                                                        <option value="{{ $workout->id }}"
                                                                            @if ($class->workout_id == $workout->id) selected @endif>
                                                                            {{ $workout->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('workout_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="activity_id">{{ __('Activities') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="activity_id[]" id="activity_id"
                                                                    class="form-select select2" multiple>
                                                                    <option value="">{{ __('Select Activities') }}
                                                                    </option>
                                                                    @foreach ($activities as $activity)
                                                                        <option value="{{ $activity->id }}"
                                                                            @if (in_array($activity->id, $classActivities)) selected @endif>
                                                                            {{ $activity->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('activity_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="trainer_id">{{ __('Trainers') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="trainer_id[]" id="trainer_id"
                                                                    class="form-select select2" multiple>
                                                                    <option value="">{{ __('Select Trainers') }}
                                                                    </option>
                                                                    @foreach ($trainers as $trainer)
                                                                        <option value="{{ $trainer->id }}"
                                                                            @if (in_array($trainer->id, $classTrainers)) selected @endif>
                                                                            {{ $trainer->user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('trainer_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="status">{{ __('Status') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="status" id="status"
                                                                    class="form-select">
                                                                    <option value="1"
                                                                        @if ($class->status == 1) selected @endif>
                                                                        {{ __('Active') }}</option>
                                                                    <option value="0"
                                                                        @if ($class->status == 0) selected @endif>
                                                                        {{ __('Inactive') }}</option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
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

    {{-- Media Modal Show --}}
    @if (Module::isEnabled('Media'))
        @stack('media_list_html')
    @endif
@endsection


@if ($code == $languages->first()->code)
    @push('js')
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
