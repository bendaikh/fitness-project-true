@extends('admin.master_layout')
@section('title')
    <title>{{ __('Send bulk mail to all') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Send bulk mail to all') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Send bulk mail to all') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.send-bulk-mail-to-all') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="">{{ __('Subject') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="subject">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('Description') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" class="summernote" id="" cols="30" rows="10" data-translate="true"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('Send Mail') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
