@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Award') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit Award') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Award List') => route('admin.award.index'),
                __('Edit Award') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Award') }}</h4>
                                <div>
                                    <a href="{{ route('admin.award.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.award.update', $award->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        value="{{ old('name', $award->name) }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-12">
                                                    <label>{{ __('Award For') }}<span class="text-danger">*</span></label>
                                                    <select class="form-select" name="type">
                                                        <option value="winner"
                                                            @if ($award->type == 'winner') selected @endif>
                                                            {{ __('Winner') }}</option>
                                                        <option value="runner_up"
                                                            @if ($award->type == 'runner_up') selected @endif>
                                                            {{ __('Runner Up') }}</option>
                                                        <option value="participation"
                                                            @if ($award->type == 'participation') selected @endif>
                                                            {{ __('Participation') }}</option>
                                                    </select>
                                                    @error('type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label>{{ __('Date') }} <span class="text-danger">*</span></label>
                                                    <input type="text" id="date" class="form-control datepicker"
                                                        name="date" value="{{ old('date', $award->date) }}"
                                                        autocomplete="off">
                                                    @error('date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-12 col-md-6">
                                                    <label>{{ __('Status') }}<span class="text-danger">*</span></label>
                                                    <select class="form-select" name="status">
                                                        <option value="1"
                                                            @if ($award->status == 1) selected @endif>
                                                            {{ __('Active') }}</option>
                                                        <option value="0"
                                                            @if ($award->status == 0) selected @endif>
                                                            {{ __('Inactive') }}</option>
                                                    </select>
                                                    @error('status')
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
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>{{ __('Image') }}<span class="text-danger">*</span></label>
                                                    <div id="preview" class="image-preview"
                                                        @if (!empty($award->image)) style="background-image: url({{ asset($award->image) }}); background-size: cover; background-position: center center;" @endif>
                                                        <label for="upload" id="label">{{ __('Image') }}</label>
                                                        <input type="file" name="image" id="upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label>{{ __('Description') }}</label>
                                                    <textarea id="description" class="form-control h-80px" name="description" rows="3">{{ old('description', $award->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                setupImagePreview('upload', 'preview');
            });
        })(jQuery);
    </script>
@endpush
