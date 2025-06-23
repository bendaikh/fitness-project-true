@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Gallery Video') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Gallery Video') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.galleryVideo.index') }}">{{ __('Gallery Video List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Gallery Video') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <form action="{{ route('admin.galleryVideo.update', $video->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ __('Edit Gallery Video') }}</h4>
                                    <div>
                                        <a href="{{ route('admin.galleryVideo.index') }}" class="btn btn-primary"><i
                                                class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="group">{{ __('Group') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="group_id" id="group" class="form-select">
                                                    @foreach ($galleryGroups as $group)
                                                        <option value="{{ $group->id }}"
                                                            @if ($video->group_id == $group->id) selected @endif>
                                                            {{ __($group->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('group')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="status">{{ __('Status') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="status" id="status" class="form-select">
                                                    <option value="1"
                                                        @if ($video->status == 1) selected @endif>
                                                        {{ __('Active') }}</option>
                                                    <option value="0"
                                                        @if ($video->status == 0) selected @endif>
                                                        {{ __('Inactive') }}</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group row d-flex justify-content-center align-items-center">
                                                <div class="col-8">
                                                    <h2 class="section-title">{{ __('Videos') }}</h2>
                                                </div>
                                                <div class="col-4 d-flex justify-content-end">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm text-white btn_link">{{ __('Add Videos') }}</button>
                                                </div>
                                            </div>
                                            <div class="link_container">
                                                @foreach ($video->videos as $index => $vid)
                                                    <div class="d-flex mt-2 video-container">
                                                        <input type="text" class="form-control"
                                                            name="video_link[{{ $index }}]"
                                                            value="{{ old('video_link', $vid['link']) }}"
                                                            placeholder="Video Link">
                                                        <input type="file" name="video_image[{{ $index }}]"
                                                            class="form-control ms-2" placeholder="Video Image"
                                                            accept="image/*">
                                                        @if ($loop->index != 0)
                                                            <button class="btn btn-danger btn_link remove_link ms-2"
                                                                type="button">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="text-center offset-md-2 col-md-8 mt-3">
                                                <x-admin.update-button :text="__('Update')">
                                                </x-admin.update-button>
                                            </div>
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


@push('js')
    <script>
        'use strict';
        $(document).ready(function() {
            $('.btn_link').on('click', function() {
                let index = $('.link_container').children().length;
                $('.link_container').append(`
                    <div class="d-flex mt-2 video-container">
                        <input type="text" class="form-control" name="video_link[${index}]" placeholder="Video Link">
                        <input type="file" name="video_image[${index}]" class="form-control ms-2" placeholder="Video Image" accept="image/*">
                        <button class="btn btn-danger btn_link remove_link ms-2" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `);
            });
            $(document).on('click', '.remove_link', function() {
                const container = $(this).closest('.video-container')
                container.remove().remove();
            });
        });
    </script>
@endpush
