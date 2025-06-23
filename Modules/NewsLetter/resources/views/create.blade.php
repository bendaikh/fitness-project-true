@extends('admin.master_layout')
@section('title')
    <title>{{ __('Send bulk mail') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Send bulk mail') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Send bulk mail') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.send-mail-to-subscriber') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">{{ __('Subject') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Description') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" class="summernote" id="" cols="30" rows="10" data-translate="true"></textarea>
                                    </div>

                                    <button class="btn btn-primary">{{ __('Send Email') }}</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
