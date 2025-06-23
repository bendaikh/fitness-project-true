@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Class Schedule') }}</title>
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
                <h1>{{ __('Create Class Schedule') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.class.index') }}">{{ __('Class Schedule List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Class Schedule') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Class Schedule') }}</h4>
                                <div>
                                    <a href="{{ route('admin.class.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.class.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 row">
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
                                                    <label for="date">{{ __('Date') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="date" name="date"
                                                        value="{{ old('date') }}" class="form-control datepicker"
                                                        autocomplete="off">
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
                                                        value="{{ old('start_at') }}" class="form-control clockpicker">
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
                                                        value="{{ old('end_at') }}" class="form-control clockpicker">
                                                    @error('end_at')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">{{ __('Description') }}</label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="summernote">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="room">{{ __('Room') }}</label>
                                                            <input type="text" name="room" class="form-control"
                                                                id="room" value="{{ old('room') }}">
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
                                                                <option value="" selected disabled>
                                                                    {{ __('Select Workout') }}
                                                                </option>
                                                                @foreach ($workouts as $workout)
                                                                    <option value="{{ $workout->id }}">
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
                                                                <option value="">
                                                                    {{ __('Select Activities') }}
                                                                </option>
                                                                @foreach ($activities as $activity)
                                                                    <option value="{{ $activity->id }}">
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
                                                                <option value="">
                                                                    {{ __('Select Trainers') }}
                                                                </option>
                                                                @foreach ($trainers as $trainer)
                                                                    <option value="{{ $trainer->id }}">
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
