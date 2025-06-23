@extends('admin.master_layout')
@section('title')
    <title>{{ __('Email Configuration') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('Email Configuration') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Email Configuration') }}</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column" id="emailTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="setting-tab" data-bs-toggle="tab"
                                            href="#setting_tab" role="tab" aria-controls="setting"
                                            aria-selected="true">{{ __('Setting') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="email-template-tab" data-bs-toggle="tab"
                                            href="#email_template_tab" role="tab" aria-controls="email-template"
                                            aria-selected="false">{{ __('Email Template') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade active show" id="setting_tab" role="tabpanel">
                                        <form action="{{ route('admin.update-email-configuration') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Sender Name') }}</label>
                                                        <input type="text" name="mail_sender_name"
                                                            value="{{ $setting->mail_sender_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('Mail Host') }}</label>
                                                        @if (env('APP_MODE') == 'DEMO')
                                                            <input type="text" name="mail_host" value="test.mailhost"
                                                                class="form-control">
                                                        @else
                                                            <input type="text" name="mail_host"
                                                                value="{{ $setting->mail_host }}" class="form-control">
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">{{ __('Email') }}</label>
                                                        @if (env('APP_MODE') == 'DEMO')
                                                            <input type="email" name="mail_sender_email"
                                                                value="no-reply@gmail.com" class="form-control">
                                                        @else
                                                            <input type="email" name="mail_sender_email"
                                                                value="{{ $setting->mail_sender_email }}"
                                                                class="form-control">
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('SMTP User Name') }}</label>
                                                        @if (env('APP_MODE') == 'DEMO')
                                                            <input type="text" name="mail_username"
                                                                value="no-reply@gmail.com" class="form-control">
                                                        @else
                                                            <input type="text" name="mail_username"
                                                                value="{{ $setting->mail_username }}" class="form-control">
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('SMTP Password') }}</label>
                                                        @if (env('APP_MODE') == 'DEMO')
                                                            <input type="text" name="mail_password" value="password1234"
                                                                class="form-control">
                                                        @else
                                                            <input type="text" name="mail_password"
                                                                value="{{ $setting->mail_password }}" class="form-control">
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mail_port">{{ __('Mail Port') }}</label>
                                                        <input type="text" name="mail_port"
                                                            value="{{ $setting->mail_port }}" class="form-control"
                                                            id="mail_port">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mail_encryption">{{ __('Mail Encryption') }}</label>
                                                        <select name="mail_encryption" id="mail_encryption"
                                                            class="form-select">
                                                            <option
                                                                {{ $setting->mail_encryption == 'tls' ? 'selected' : '' }}
                                                                value="tls">{{ __('TLS') }}</option>
                                                            <option
                                                                {{ $setting->mail_encryption == 'ssl' ? 'selected' : '' }}
                                                                value="ssl">{{ __('SSL') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <x-admin.update-button :text="__('Update')"></x-admin.update-button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="email_template_tab" role="tabpanel">
                                        <div class="table-responsive table-invoice">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('SN') }}</th>
                                                        <th>{{ __('Email Template') }}</th>
                                                        <th>{{ __('Subject') }}</th>
                                                        <th>{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($templates as $index => $item)
                                                        @php
                                                            $name = str_replace('_', ' ', $item->name);
                                                            $name = ucwords($name);
                                                        @endphp
                                                        <tr>
                                                            <td>{{ ++$index }}</td>
                                                            <td>{{ $name }}</td>
                                                            <td>{{ $item->subject }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.edit-email-template', $item->id) }}"
                                                                    class="btn btn-success btn-sm"><i
                                                                        class="fas fa-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
        $(document).ready(function() {
            "use strict";
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#emailTab a[href="#' + activeTab + '"]').tab('show');
            } else {
                $('#emailTab a:first').tab('show');
            }

            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                var newTab = $(e.target).attr('href').substring(1);
                localStorage.setItem('activeTab', newTab);
            });
        });
    </script>
@endpush
