@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Gallery Image') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Gallery Image') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.galleryImage.index') }}">{{ __('Gallery Image List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Gallery Image') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <form action="{{ route('admin.galleryImage.update', $imageGallery->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ __('Edit Gallery Image') }}</h4>
                                    <div>
                                        <a href="{{ route('admin.galleryImage.index') }}" class="btn btn-primary"><i
                                                class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-Image">
                                                <label for="group">{{ __('Group') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="group_id" id="group" class="form-select">
                                                    @foreach ($galleryGroups as $group)
                                                        <option value="{{ $group->id }}"
                                                            @if ($group->id == $imageGallery->group_id) selected @endif>
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
                                                        @if ($imageGallery->status == 1) selected @endif>
                                                        {{ __('Active') }}</option>
                                                    <option value="0"
                                                        @if ($imageGallery->status == 0) selected @endif>
                                                        {{ __('Inactive') }}</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-3">
                                                <x-media::media-input name="images[]" multiple="yes" label_text="Images"
                                                    :dataImages="$imageGallery->image_array" />
                                            </div>
                                        </div>
                                        <div class="text-center offset-md-2 col-md-8 mt-3">
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

    {{-- Media Modal Show --}}
    @if (Module::isEnabled('Media'))
        @stack('media_list_html')
    @endif
@endsection



{{-- Media Js --}}
@push('js')
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
