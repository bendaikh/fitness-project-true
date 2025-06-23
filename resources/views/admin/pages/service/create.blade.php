@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Service') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Service') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Service List') => 'admin.service.index',
                __('Create Service') => '#',
            ]" />

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Service') }}</h4>
                                <div>
                                    <a href="{{ route('admin.service.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-2">{{ __('Service') }}</h4>
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                                    <input type="text" id="title" class="form-control" name="title"
                                                        value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                                    <input type="text" id="slug" class="form-control" name="slug"
                                                        value="{{ old('slug') }}">
                                                    @error('slug')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>{{ __('Tags') }}</label>
                                                    <input type="text" class="form-control tags" name="tags"
                                                        value="{{ old('tags') }}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>{{ __('Download File') }}</label>
                                                    <input type="file" id="file" class="form-control"
                                                        name="file">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>{{ __('Status') }}<span class="text-danger">*</span></label>
                                                    <select class="form-select" name="status">
                                                        <option value="1">{{ __('Active') }}</option>
                                                        <option value="0">{{ __('Inactive') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>{{ __('Short Description') }}</label>
                                                    <textarea id="short_description" class="form-control height_80" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                                    @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>{{ __('Description') }}</label>
                                                    <textarea id="description" class="form-control summernote" name="description" rows="3">{{ old('description') }}</textarea>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-2">{{ __('Image Gallery') }}</h4>
                                            <div class="row">
                                                <div class="form-group col-12 col-md-6">
                                                    <label>{{ __('Featured Image') }} <span
                                                            class="text-danger">*</span></label>
                                                    <div id="image_preview" class="image-preview w-100">
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
                                                            label_text="Images" />
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
                                                <button class="btn btn-primary btn-link text-white btn-sm" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </h4>
                                            <div class="row">
                                                <div class="form-group col-12 link_container">
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" name="video_link[]"
                                                            placeholder="Video Link">
                                                        <input type="file" name="video_image[]"
                                                            class="form-control ms-2" placeholder="Video Image"
                                                            accept="image/*">
                                                    </div>
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
                                                <button class="btn btn-primary btn-faqs text-white btn-sm" type="button">
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
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="question[]"
                                                                value="" placeholder="Question">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="answer[]"
                                                                value="" placeholder="Answer">
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
@push('js')
    <script>
        'use strict'

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
        $('[name="title"]').on('input', function() {
            let slug = convertToSlug($(this).val())
            $('[name="slug"]').val(slug)
        })
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
