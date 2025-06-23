@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Currency') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit Currency') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Settings') => route('admin.settings'),
                __('Currency List') => route('admin.currency.index'),
                __('Edit Currency') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Edit Currency')" />
                                <div>
                                    <x-admin.back-button :href="route('admin.currency.index')" />
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.currency.update', $currency->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <x-admin.form-input id="currency_name" name="currency_name"
                                                label="{{ __('Currency Name') }}"
                                                placeholder="{{ __('Enter Currency Name') }}"
                                                value="{{ $currency->currency_name }}" required="true" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <x-admin.form-input id="country_code" name="country_code"
                                                label="{{ __('Country Code') }}"
                                                placeholder="{{ __('Enter Country Code') }}"
                                                value="{{ $currency->country_code }}" required="true" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <x-admin.form-select name="currency_code" id="currency_code" class="select2"
                                                label="{{ __('Currency Code') }}" required="true">
                                                <x-admin.select-option value=""
                                                    text="{{ __('Select Currency Code') }}" />
                                                @foreach ($all_currency as $key => $value)
                                                    <x-admin.select-option :selected="$key == $currency->currency_code" value="{{ $key }}"
                                                        text="{{ $value }}" />
                                                @endforeach
                                            </x-admin.form-select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <x-admin.form-input id="currency_icon" name="currency_icon"
                                                label="{{ __('Currency Icon') }}"
                                                placeholder="{{ __('Enter Currency Icon') }}"
                                                value="{{ $currency->currency_icon }}" required="true" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <x-admin.form-input id="currency_rate" name="currency_rate"
                                                label="{{ __('Currency Rate') }}"
                                                placeholder="{{ __('Enter Currency Rate') }}"
                                                value="{{ $currency->currency_rate }}" required="true" />
                                        </div>

                                        <div class="form-group col-6">
                                            <x-admin.form-select id="is_default" name="is_default"
                                                label="{{ __('Default') }}" class="form-select">
                                                <x-admin.select-option :selected="$currency->is_default == 'no'" value="no"
                                                    text="{{ __('No') }}" />
                                                <x-admin.select-option :selected="$currency->is_default == 'yes'" value="yes"
                                                    text="{{ __('Yes') }}" />
                                            </x-admin.form-select>
                                        </div>


                                        <div class="form-group col-12">
                                            <x-admin.form-select id="currency_position" name="currency_position"
                                                label="{{ __('Currency Position') }}" class="form-select">
                                                <x-admin.select-option :selected="$currency->currency_position == 'before_price'" value="before_price"
                                                    text="{{ __('Before Price') }}" />
                                                <x-admin.select-option :selected="$currency->currency_position == 'before_price_with_space'" value="before_price_with_space"
                                                    text="{{ __('Before Price With Space') }}" />
                                                <x-admin.select-option :selected="$currency->currency_position == 'after_price'" value="after_price"
                                                    text="{{ __('After Price') }}" />
                                                <x-admin.select-option :selected="$currency->currency_position == 'after_price_with_space'" value="after_price_with_space"
                                                    text="{{ __('After Price With Space') }}" />
                                            </x-admin.form-select>
                                        </div>

                                        <div class="form-group col-12">
                                            <x-admin.form-switch name="status" label="{{ __('status') }}"
                                                active_value="active" inactive_value="inactive" :checked="$currency->status == 'active'" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <x-admin.update-button :text="__('Update')" />
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
