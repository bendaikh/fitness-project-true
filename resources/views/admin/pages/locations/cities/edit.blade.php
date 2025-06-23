@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit City') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit City') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('City List') => route('admin.city.index'),
                __('Edit City') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit City') }}</h4>
                                <div>
                                    <a href="{{ route('admin.city.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.city.update', $city->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ old('name', $city->name) }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('State') }} <span class="text-danger">*</span></label>
                                            <select name="state_id" class="form-select">
                                                <option value="" disabled>{{ __('Select State') }}</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        @if ($city->state_id == $state->id) selected @endif>
                                                        {{ __($state->name) }}</option>
                                                @endforeach
                                            </select>
                                            @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <x-admin.update-button :text="__('Update')">
                                            </x-admin.update-button>
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
    <script>
        "use strict";
        $(document).ready(function() {
            $('[name="state_id"]').select2();
        })
    </script>
@endpush
