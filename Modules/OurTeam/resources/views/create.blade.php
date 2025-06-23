@extends('admin.master_layout')
@section('title')
    <title>{{ __('Our Team') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Team') }}</h1>
            </div>

            <div class="section-body">
                <a href="{{ route('admin.ourteam.index') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('Our Team') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.ourteam.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Avatar Image') }}<span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">{{ __('Image') }}</label>
                                                <input type="file" name="image" id="image-upload">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Desgination') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="designation" class="form-control" name="designation">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Facebook') }} </label>
                                            <input type="text" class="form-control" name="facebook">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Twitter') }} </label>
                                            <input type="text" class="form-control" name="twitter">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Linkedin') }} </label>
                                            <input type="text" class="form-control" name="linkedin">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Instagram') }} </label>
                                            <input type="text" class="form-control" name="instagram">
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <select name="status" class="form-select">
                                                <option value="active">{{ __('Active') }}</option>
                                                <option value="inactive">{{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                                        </div>
                                    </div>
                                </form>
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
