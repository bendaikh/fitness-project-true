@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Media') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <div id="loader" class="LoadingOverlay d-none">
            <div class="Line-Progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Media') }}</h1>
            </div>

            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Media') }}</h4>
                                <div>
                                    <a href="{{ route('admin.media.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.media.update', $media->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="form-group col-md-8 offset-md-2">
                                            <label>{{ __('Thumbnail Image') }}<span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview"
                                                @if ($media->path ?? false) style="background-image: url({{ asset($media->path) }}); background-size: cover; background-position: center center;" @endif>
                                                <label for="image-upload" id="image-label">{{ __('Image') }}</label>
                                                <input type="file" name="image" id="image-upload">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8 offset-md-2">
                                            <label>{{ __('Title') }}</label>
                                            <input data-translate="true" type="text" id="title" class="form-control"
                                                name="title" value="{{ $media->title }}" disabled>
                                        </div>
                                        <div class="form-group col-md-8 offset-md-2">
                                            <label>{{ __('Description') }}</label>
                                            <textarea name="description" class="form-control">{{ $media->description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-8 offset-md-2">
                                            <label>{{ __('Alt Text') }}</label>
                                            <input data-translate="true" type="text" id="alt_text" class="form-control"
                                                name="alt_text" value="{{ $media->alt_text }}">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="text-center col-md-8 offset-md-2">
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
    <script src="{{ asset('backend/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        "use strict";
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "{{ __('Choose Image') }}",
            label_selected: "{{ __('Change Image') }}",
            no_label: false,
            success_callback: null
        });
    </script>
@endpush
