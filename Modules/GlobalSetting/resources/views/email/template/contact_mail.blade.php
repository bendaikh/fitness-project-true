@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Email Template') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Email Template') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.email-configuration') }}">{{ __('Email Configuration') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Email Template') }}</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>{{ __('Variable') }}</th>
                                        <th>{{ __('Meaning') }}</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @php
                                                $name = '{{ name }}';
                                            @endphp
                                            <td>{{ $name }}</td>
                                            <td>{{ __('User Name') }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $email = '{{ email }}';
                                            @endphp
                                            <td>{{ $email }}</td>
                                            <td>{{ __('User Email') }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $phone = '{{ phone }}';
                                            @endphp
                                            <td>{{ $phone }}</td>
                                            <td>{{ __('User Phone') }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $subject = '{{ subject }}';
                                            @endphp
                                            <td>{{ $subject }}</td>
                                            <td>{{ __('User Subject') }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $message = '{{ message }}';
                                            @endphp
                                            <td>{{ $message }}</td>
                                            <td>{{ __('Message') }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.update-email-template', $template->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">{{ __('Subject') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ $template->subject }}"
                                            name="subject">
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('Message') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="message" cols="30" rows="10" class="form-control summernote">{{ $template->message }}</textarea>
                                    </div>
                                    <x-admin.update-button :text="__('Update')"></x-admin.update-button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
