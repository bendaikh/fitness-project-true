@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Partner') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Partner') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Partner List') => route('admin.partner.index'),
                __('Create Partner') => '#',
            ]" />


            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Partner') }}</h4>
                                <div>
                                    <a href="{{ route('admin.partner.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.partner.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('Logo') }} <span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">{{ __('Logo') }}</label>
                                                <input type="file" name="logo" id="image-upload">
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>{{ __('Link') }} </label>
                                            <input type="text" id="link" class="form-control" name="link">
                                        </div>


                                        <div class="form-group col-12">
                                            <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control">
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0">{{ __('Inactive') }}</option>
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

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $.uploadPreview({
                    input_field: "#image-upload",
                    preview_box: "#image-preview",
                    label_field: "#image-label",
                    label_default: "{{ __('Choose Logo') }}",
                    label_selected: "{{ __('Change Logo') }}",
                    no_label: false,
                    success_callback: null
                });
            });
        })(jQuery);
    </script>
@endsection
