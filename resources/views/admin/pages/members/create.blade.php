@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Member') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Member') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.members.index') }}">{{ __('Members') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create Member') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4><i class="fas fa-plus-square"></i> {{ __('Create Member') }}</h4>
                                <div>
                                    <a href="{{ route('admin.members.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.members.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Login Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Phone') }} <span class="text-danger">*</span></label>
                                            <input type="tel" id="phone" class="form-control" name="phone"
                                                value="{{ old('phone') }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                            <input type="password" id="password" class="form-control" name="password"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Personal Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Date of Birth') }}</label>
                                            <input type="text" id="dob" class="form-control datepicker"
                                                name="dob" value="{{ old('dob') }}" data-date-end-date="-1068d"
                                                autocomplete="off">
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Address') }}</label>
                                            <input type="text" id="address" class="form-control" name="address"
                                                value="{{ old('address') }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="gender">{{ __('Gender') }}<span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">{{ __('Select') }}</option>
                                                <option value="male">{{ __('Male') }}</option>
                                                <option value="female">{{ __('Female') }}</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="member_id">{{ __('Member ID') }}<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="member_id" class="form-control" name="member_id"
                                                value="{{ $memberId }}" readonly>
                                            @error('member_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Physical Information') }}</div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="height">{{ __('Height (cm)') }}</label>
                                            <input type="text" id="height" class="form-control" name="height"
                                                value="{{ old('height') }}">
                                            @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="weight">{{ __('Weight (kg)') }}</label>
                                            <input type="text" id="weight" class="form-control" name="weight"
                                                value="{{ old('weight') }}">
                                            @error('weight')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="chest">{{ __('Chest (inch)') }}</label>
                                            <input type="text" id="chest" class="form-control" name="chest"
                                                value="{{ old('chest') }}">
                                            @error('chest')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            @php
                                                $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                            @endphp
                                            <label for="blood_group">{{ __('Blood Group') }} </label>
                                            <select name="blood_group" id="blood_group" class="form-control select2">
                                                <option value="" disabled selected>{{ __('Select Group') }}</option>
                                                @foreach ($bloodGroups as $bloodGroup)
                                                    <option value="{{ $bloodGroup }}"
                                                        @if (old('blood_group') == $bloodGroup) selected @endif>
                                                        {{ $bloodGroup }}</option>
                                                @endforeach
                                            </select>
                                            @error('blood_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Emergency Contact Information') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="emergency_contact">{{ __('Emergency Contact Name') }}</label>
                                            <input type="text" id="emergency_contact" class="form-control"
                                                name="emergency_contact" value="{{ old('emergency_contact') }}">
                                            @error('emergency_contact')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="emergency_phone">{{ __('Emergency Contact Number') }}</label>
                                            <input type="tel" id="emergency_phone" class="form-control"
                                                name="emergency_phone" value="{{ old('emergency_phone') }}">
                                            @error('emergency_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="emergency_relation">{{ __('Relation With Member') }}</label>
                                            <input type="text" id="emergency_relation" class="form-control"
                                                name="emergency_relation" value="{{ old('emergency_relation') }}">
                                            @error('emergency_relation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-12">
                                            <div class="section-title">{{ __('More Information') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="referred_by">{{ __('Referred By') }}</label>
                                            <input type="text" id="referred_by" class="form-control"
                                                name="referred_by" value="{{ old('referred_by') }}">
                                            @error('referred_by')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="locker_no">{{ __('Locker Number') }}</label>
                                            <select name="locker_no" id="locker_no" class="form-control select2">
                                                <option value="" disabled selected>{{ __('Select Locker') }}
                                                </option>
                                                @foreach ($lockers as $locker)
                                                    <option value="{{ $locker->locker_no }}">{{ $locker->locker_no }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('locker_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Payment Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>
                                                <input type="hidden" value="0" name="is_trial"
                                                    class="custom-switch-input">
                                                <input type="checkbox" value="1" name="is_trial"
                                                    class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('Is Trial?') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-12 row is_has_trial d-none">
                                            <div class="form-group col-md-6">
                                                <label for="trial_start_date">{{ __('Trial Start Date') }}</label>
                                                <input type="text" id="trial_start_date"
                                                    class="form-control datepicker" name="trial_start_date"
                                                    value="{{ old('trial_start_date', now()->format('Y-m-d')) }}" disabled
                                                    autocomplete="off">
                                                @error('trial_start_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="trial_end_date">{{ __('Trial End Date') }}</label>
                                                <input type="text" id="trial_end_date" class="form-control datepicker"
                                                    name="trial_end_date"
                                                    value="{{ old('trial_end_date', now()->addDays(2)->format('Y-m-d')) }}"
                                                    disabled autocomplete="off">
                                                @error('trial_end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 row is_not_trial">
                                            <div class="form-group col-md-4">

                                                <label for="plan_id">{{ __('Plan') }}</label>
                                                <select name="plan_id" id="plan_id" class="form-control select2">
                                                    <option value="" disabled selected>{{ __('Select Plan') }}
                                                    </option>
                                                    @foreach ($plans as $plan)
                                                        <option value="{{ $plan->id }}"
                                                            data-amount="{{ currency($plan->plan_price) }}">
                                                            {{ $plan->plan_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('plan_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="gateway">{{ __('Payment Method') }}<span
                                                        class="text-danger payment_method_required d-none">*</span></label>
                                                <select name="gateway" id="gateway" class="form-control select2">
                                                    <option value="" disabled selected>{{ __('Select Gateway') }}
                                                    </option>
                                                    @foreach ($paymentGateways as $gateway)
                                                        <option value="{{ $gateway }}">
                                                            {{ ucfirst(str_replace('_', ' ', $gateway)) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('gateway')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="amount">{{ __('Amount') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text currency_icon">
                                                            {{ currency_icon() }}
                                                        </div>
                                                    </div>
                                                    <input type="text" id="amount" class="form-control"
                                                        name="amount" value="{{ old('amount') }}">
                                                </div>
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pay_amount">{{ __('Pay Amount') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text currency_icon">
                                                            {{ currency_icon() }}
                                                        </div>
                                                    </div>
                                                    <input type="text" id="pay_amount" class="form-control"
                                                        name="pay_amount" value="{{ old('pay_amount') }}">
                                                </div>
                                                @error('pay_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 due_amount_container d-none ">
                                                <label for="due_amount">{{ __('Due Amount') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text currency_icon">
                                                            {{ currency_icon() }}
                                                        </div>
                                                    </div>
                                                    <input type="text" id="due_amount" class="form-control"
                                                        name="due_amount" value="{{ old('due_amount') }}" readonly>
                                                </div>
                                                @error('due_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 due_amount_container d-none">
                                                <label for="due_at">{{ __('Due Pay At') }}</label>
                                                <input type="text" id="due_at" class="form-control datepicker"
                                                    name="due_at" value="{{ old('due_at') }}" autocomplete="off">
                                                @error('due_at')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 transaction_id d-none">
                                                <label for="transaction_id">{{ __('Transection Id') }}</label>
                                                <input type="text" id="transaction_id" class="form-control"
                                                    name="transaction_id" value="{{ old('transaction_id') }}">
                                                @error('transaction_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 account_details d-none">
                                                <label for="transaction_id">{{ __('Account Details') }}</label>
                                                <textarea name="transaction_id" id="transaction_id" cols="30" class='form-control' rows="10"></textarea>
                                                @error('transaction_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('Profile Image') }}</div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label>{{ __('Image') }}</label>
                                            <div id="preview" class="image-preview">
                                                <label for="upload" id="label">{{ __('Image') }}</label>
                                                <input type="file" name="image" id="upload">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <input type="hidden" value="1" name="status">
                                    </div>
                                    <div class="row">
                                        <div class="text-center col-md-8">
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

@push('js')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {

                $("#title").on("keyup", function(e) {
                    $("#slug").val(convertToSlug($(this).val()));
                })
                $('[name="is_trial"]').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.is_not_trial').addClass('d-none');
                        $('.is_has_trial').removeClass('d-none');

                        // remove disable attribute to trial dates
                        $('#trial_start_date').prop('disabled', false);
                        $('#trial_end_date').prop('disabled', false);

                        // add disabled attributes to all input and select tag in .is_not_trial
                        $('.is_not_trial input, .is_not_trial select').prop('disabled', true);
                    } else {
                        $('.is_not_trial').removeClass('d-none');
                        $('.is_has_trial').addClass('d-none');

                        // add disable attribute to trial dates
                        $('#trial_start_date').prop('disabled', true);
                        $('#trial_end_date').prop('disabled', true);

                        // remove disabled attributes to all input and select tag in .is_not_trial
                        $('.is_not_trial input, .is_not_trial select').prop('disabled', false);
                    }

                })
                $('#plan_id').on('change', function() {

                    let amount = $(this).find(':selected').data('amount');

                    amount = amount.replace(/[^0-9.]/g, '');
                    $('#amount').val(amount);
                    $("#pay_amount").val(amount);

                    if (parseFloat(amount) != 0) {
                        $('.payment_method_required').removeClass('d-none');
                    } else {

                        $('.payment_method_required').addClass('d-none');
                    }

                })


                $('#pay_amount, #amount').on('keyup', function() {
                    const amount = parseFloat($('#amount').val());
                    const payAmount = parseFloat($('#pay_amount').val());
                    let dueAmount = amount - payAmount;

                    if (dueAmount > 0) {

                        // check if due has .00 value
                        if (dueAmount % 1 == 0) {
                            dueAmount += '.00'
                        }

                        $('#due_amount').val(dueAmount);
                        $('.due_amount_container').removeClass('d-none');
                    } else {
                        $('.due_amount_container').addClass('d-none');
                        $('#due_amount').val(dueAmount);
                    }
                })
                $('#gateway').on('change', function() {
                    if ($(this).val() == 'bank_transfer') {
                        $('.account_details').removeClass('d-none');
                        $('.transaction_id').addClass('d-none');
                    } else {
                        $('.transaction_id').removeClass('d-none');
                        $('.account_details').addClass('d-none');
                    }
                })
                $('.image').on('change', function() {
                    $('.preview').removeClass('d-none');
                })
                setupImagePreview('upload', 'preview');
            });
        })(jQuery);
    </script>
@endpush
