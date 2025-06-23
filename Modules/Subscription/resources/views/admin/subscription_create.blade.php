@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Subscription Plan') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Subscription Plan') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Subscription Plan List') => route('admin.subscription-plan.index'),
                __('Create Subscription Plan') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>{{ __('Create Subscription Plan') }}</h4>
                                    <div>
                                        <a href="{{ route('admin.subscription-plan.index') }}" class="btn btn-primary"><i
                                                class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{ route('admin.subscription-plan.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Plan Name') }} <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="plan_name" class="form-control form_control">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Plan Price') }} <span data-toggle="tooltip"
                                                        data-placement="top" class="fa fa-info-circle text--primary"
                                                        title="For free plan use(0.00), price should be USD"> <span
                                                            class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            {{ currency_icon() }}
                                                        </div>
                                                    </div>
                                                    <input type="number" name="plan_price" class="form-control currency">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Expiration Date') }} <span
                                                        class="text-danger">*</span></label>

                                                <select name="expiration_date" id="" class="form-select">
                                                    @foreach ($subscriptionTypes as $plan)
                                                        <option value="{{ $plan }}">{{ ucfirst($plan) }}</option>
                                                    @endforeach

                                                </select>

                                            </div>

                                            {{-- write your extra input field here depend on your project requirement --}}

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Plan Price') }}
                                                    ({{ __('If Paid Yearly') }})</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            {{ currency_icon() }}
                                                        </div>
                                                    </div>
                                                    <input type="number" name="yearly_price" class="form-control currency">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Serial') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="serial" class="form-control form_control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Free Trail') }} ({{ __('Days') }})<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="free_trial" class="form-control form_control"
                                                    value="3">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">{{ __('Status') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="status" id="" class="form-select">
                                                    <option value="1">{{ __('Active') }}</option>
                                                    <option value="0">{{ __('Inactive') }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <x-admin.save-button :text="__('Save')"></x-admin.save-button>
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
