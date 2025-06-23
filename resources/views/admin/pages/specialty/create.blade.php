@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Specialty') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Specialty') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Specialty List') => route('admin.specialty.index'),
                __('Create Specialty') => '#',
            ]" />

            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Specialty') }}</h4>
                                <div>
                                    <a href="{{ route('admin.specialty.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.specialty.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{ old('slug') }}">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    required value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
@endsection

@push('js')
    <script>
        'use strict';

        $("[name='name']").on('input', function() {
            const title = $(this).val();
            const slug = convertToSlug(title)
            $("[name='slug']").val(slug);
        })
    </script>
@endpush
