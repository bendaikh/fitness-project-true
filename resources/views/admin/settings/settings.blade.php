@extends('admin.master_layout')
@section('title')
    <title>{{ __('Settings') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Settings') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Settings') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('setting.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('General Setting') }}</h4>
                                    <a href="{{ route('admin.general-setting') }}"
                                        class="card-cta">{{ __('Change Setting') }}
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Email Configuration') }}</h4>
                                    <a href="{{ route('admin.email-configuration') }}"
                                        class="card-cta">{{ __('Change Setting') }} <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-key"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Credential Settings') }}</h4>
                                    <a href="{{ route('admin.crediential-setting') }}"
                                        class="card-cta">{{ __('Change Setting') }} <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @adminCan('language.view')
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="text-white card-icon bg-primary">
                                    <i class="fas fa-language"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Manage Language') }}</h4>
                                    <a href="{{ route('admin.languages.index') }}" class="card-cta">{{ __('Change Setting') }}
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endadminCan
                    @if (Module::isEnabled('Currency') && checkAdminHasPermission('currency.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="text-white card-icon bg-primary">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Change Currency') }}</h4>
                                    <a href="{{ route('admin.currency.index') }}"
                                        class="card-cta">{{ __('Change Setting') }} <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isShopActive() && Module::isEnabled('Tax') && checkAdminHasPermission('tax.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="text-white card-icon bg-primary">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Tax') }}</h4>
                                    <a href="{{ route('admin.tax.index') }}" class="card-cta">{{ __('Change Setting') }}
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (checkAdminHasPermission('basic.payment.view') || checkAdminHasPermission('payment.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Payment Gateway') }}</h4>
                                    @if (checkAdminHasPermission('basic.payment.view'))
                                        <a href="{{ route('admin.basicpayment') }}"
                                            class="card-cta">{{ __('Change Setting') }} <i
                                                class="fas fa-chevron-right"></i></a>
                                    @else
                                        <a href="{{ route('admin.paymentgateway') }}"
                                            class="card-cta">{{ __('Change Setting') }} <i
                                                class="fas fa-chevron-right"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (checkAdminHasPermission('admin.view') || checkAdminHasPermission('role.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="card-icon bg-primary text-white">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Admin & Roles') }}</h4>
                                    <a href="{{ route('admin.admin.index') }}" class="card-cta">{{ __('Change Setting') }}
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('setting.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="text-white card-icon bg-primary">
                                    <i class="fas fa-arrow-circle-up"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('System Update') }}</h4>
                                    <a href="{{ route('admin.system-update.index') }}"
                                        class="card-cta">{{ __('Change Setting') }} <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('addon.view'))
                        <div class="col-lg-6">
                            <div class="card card-large-icons">
                                <div class="text-white card-icon bg-primary">
                                    <i class="fas fa-plug"></i>
                                </div>
                                <div class="card-body">
                                    <h4>{{ __('Manage Addon') }}</h4>
                                    <a href="{{ route('admin.addons.view') }}" class="card-cta">{{ __('Change Setting') }}
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
