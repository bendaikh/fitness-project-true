@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Gallery Group') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Gallery Group') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.galleryGroup.index') }}">{{ __('Gallery Group List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Gallery Group') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <form action="{{ route('admin.galleryGroup.update', $group->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ __('Edit Gallery Group') }}</h4>
                                    <div>
                                        <a href="{{ route('admin.galleryGroup.index') }}" class="btn btn-primary"><i
                                                class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ old('name', $group->name) }}" placeholder="Enter Name"
                                                    class="form-control">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="type">{{ __('Type') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="type" id="type" class="form-select">
                                                    <option value="image"
                                                        @if ($group->type == 'image') selected @endif>
                                                        {{ __('Image') }}</option>
                                                    <option value="video"
                                                        @if ($group->type == 'video') selected @endif>
                                                        {{ __('Video') }}</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="status">{{ __('Status') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="status" id="status" class="form-select">
                                                    <option value="1"
                                                        @if ($group->status == 1) selected @endif>
                                                        {{ __('Active') }}</option>
                                                    <option value="0"
                                                        @if ($group->status == 0) selected @endif>
                                                        {{ __('Inactive') }}</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
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
