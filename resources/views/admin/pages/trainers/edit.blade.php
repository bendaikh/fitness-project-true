@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Trainer') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Trainer') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.trainer.index') }}">{{ __('Trainer List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Trainer') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4><i class="fas fa-plus-square"></i> {{ __('Edit Trainer') }}</h4>
                                <div>
                                    <a href="{{ route('admin.trainer.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.trainer.update', $trainer->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Login Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ old('name', $trainer?->user?->name) }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Phone') }} <span class="text-danger">*</span></label>
                                            <input type="tel" id="phone" class="form-control" name="phone"
                                                value="{{ old('phone', $trainer->user?->phone) }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ old('email', $trainer->user?->email) }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Personal Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Address') }}</label>
                                            <input type="text" id="address" class="form-control" name="address"
                                                value="{{ old('address', $trainer->user?->address) }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gender">{{ __('Gender') }}</label>
                                            <select name="gender" id="gender" class="form-select">
                                                <option value="">{{ __('Select') }}</option>
                                                <option value="male" @if ($trainer->user?->gender == 'male') selected @endif>
                                                    {{ __('Male') }}</option>
                                                <option value="female" @if ($trainer->user?->gender == 'female') selected @endif>
                                                    {{ __('Female') }}</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('More Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Working Hours Per Week') }}({{ __('Hours') }})</label>
                                            <input type="number" id="hours_per_week" class="form-control"
                                                name="hours_per_week"
                                                value="{{ old('hours_per_week', $trainer->hours_per_week) }}">
                                            @error('hours_per_week')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Specialty') }}<span class="text-danger">*</span></label>
                                            <select name="specialty_id" id="specialty_id" class="form-select select2">
                                                <option value="" selected disabled>{{ __('Select Specialty') }}
                                                </option>
                                                @foreach ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}"
                                                        @if ($trainer->specialty_id == $specialty->id) selected @endif>
                                                        {{ $specialty->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('specialty_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>{{ __('Skills') }}</label>
                                            <input type="text" id="skills" class="form-control tagify tags"
                                                name="skills" value="{{ old('skills', $trainer->skills) }}">
                                            @error('skills')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>{{ __('Description') }}</label>
                                            <textarea type="textarea" id="description" class="form-control summernote" name="description">{{ old('description', $trainer->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Social Handle') }}</div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>{{ __('Facebook') }}({{ __('Link') }})</label>
                                            <div class="input-group">
                                                <input type="text" id="facebook_link"
                                                    class="form-control currency w-75" name="facebook_link"
                                                    value="{{ old('facebook_link', $trainer->facebook_link) }}">
                                                <div class="input-group-prepend w-25">
                                                    <input class="icp icp-auto form-control" name="facebook_icon"
                                                        type="text" value="{{ $trainer->facebook_icon }}" />
                                                </div>
                                            </div>
                                            @error('facebook_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>{{ __('Instagram') }}({{ __('Link') }})</label>
                                            <div class="input-group">
                                                <input type="text" id="instagram_link"
                                                    class="form-control currency w-75" name="instagram_link"
                                                    value="{{ old('instagram_link', $trainer->instagram_link) }}">
                                                <div class="input-group-prepend w-25">
                                                    <input class="icp icp-auto form-control" name="instagram_icon"
                                                        type="text" value="{{ $trainer->instagram_icon }}" />
                                                </div>
                                            </div>
                                            @error('instagram_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>{{ __('Twitter') }}({{ __('Link') }})</label>
                                            <div class="input-group">
                                                <input type="text" id="twitter_link"
                                                    class="form-control currency w-75" name="twitter_link"
                                                    value="{{ old('twitter_link', $trainer->twitter_link) }}">
                                                <div class="input-group-prepend w-25">
                                                    <input class="icp icp-auto form-control" name="twitter_icon"
                                                        type="text" value="{{ $trainer->twitter_icon }}" />
                                                </div>
                                            </div>
                                            @error('twitter_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Profile Image') }}</div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label>{{ __('Image') }}</label>
                                            <div id="preview" class="image-preview"
                                                @if (!empty($trainer->user->image)) style="background-image: url({{ asset($trainer->user->image) }}); background-size: cover; background-position: center center;" @endif>
                                                <label for="upload" id="label">{{ __('Image') }}</label>
                                                <input type="file" name="image" id="upload">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>
                                                <input type="hidden" value="0" name="status"
                                                    class="custom-switch-input"
                                                    @if ($trainer->status == 0) checked @endif>
                                                <input type="checkbox" value="1" name="status"
                                                    class="custom-switch-input"
                                                    @if ($trainer->status == 1) checked @endif>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('Status') }}<span
                                                        class="text-danger">*</span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center col-md-8">
                                            <x-admin.update-button :text="__('Update')"></x-admin.update-button>
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
                $('.image').on('change', function() {
                    $('.preview').removeClass('d-none');
                })
                $('.icp-auto').iconpicker();
                setupImagePreview('upload', 'preview');
            });
        })(jQuery);
    </script>
@endpush
