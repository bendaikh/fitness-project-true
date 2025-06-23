@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Member') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Member') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.members.index') }}">{{ __('Members') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Edit Member') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4><i class="fas fa-plus-square"></i> {{ __('Edit Member') }}</h4>
                                <div>
                                    <a href="{{ route('admin.members.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.members.update', $member) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Personal Information') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ __('Date of Birth') }} </label>
                                            <input type="text" id="dob" class="form-control datepicker"
                                                name="dob" value="{{ old('dob', $member->dob) }}"
                                                data-date-end-date="-1068d" autocomplete="off">
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="gender">{{ __('Gender') }}<span
                                                    class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-select">
                                                <option value="" disabled>{{ __('Select') }}</option>
                                                <option value="male" @if ($member->gender == 'male') selected @endif>
                                                    {{ __('Male') }}</option>
                                                <option value="female" @if ($member->gender == 'female') selected @endif>
                                                    {{ __('Female') }}</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>{{ __('Address') }}</label>
                                            <input type="text" id="address" class="form-control" name="address"
                                                value="{{ old('address', $member->user->address) }}">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Physical Information') }}</div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="height">{{ __('Height (cm)') }}</label>
                                            <input type="text" id="height" class="form-control" name="height"
                                                value="{{ old('height', $member->height) }}">
                                            @error('height')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="weight">{{ __('Weight (kg)') }}</label>
                                            <input type="text" id="weight" class="form-control" name="weight"
                                                value="{{ old('weight', $member->weight) }}">
                                            @error('weight')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="chest">{{ __('Chest (inch)') }}</label>
                                            <input type="text" id="chest" class="form-control" name="chest"
                                                value="{{ old('chest', $member->chest) }}">
                                            @error('chest')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            @php
                                                $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                            @endphp
                                            <label for="blood_group">{{ __('Blood Group') }} </label>
                                            <select name="blood_group" id="blood_group" class="form-select select2">
                                                <option value="" disabled>{{ __('Select Group') }}</option>
                                                @foreach ($bloodGroups as $bloodGroup)
                                                    <option value="{{ $bloodGroup }}"
                                                        @if (old('blood_group', $member->blood_group) == $bloodGroup) selected @endif>
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
                                                name="emergency_contact"
                                                value="{{ old('emergency_contact', $member->emergency_contact) }}">
                                            @error('emergency_contact')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="emergency_phone">{{ __('Emergency Contact Number') }}</label>
                                            <input type="tel" id="emergency_phone" class="form-control"
                                                name="emergency_phone"
                                                value="{{ old('emergency_phone', $member->emergency_phone) }}">
                                            @error('emergency_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="emergency_relation">{{ __('Relation With Member') }}</label>
                                            <input type="text" id="emergency_relation" class="form-control"
                                                name="emergency_relation"
                                                value="{{ old('emergency_relation', $member->emergency_relation) }}">
                                            @error('emergency_relation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="section-title">{{ __('More Information') }}</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="referred_by">{{ __('Referred By') }}</label>
                                            <input type="text" id="referred_by" class="form-control"
                                                name="referred_by"
                                                value="{{ old('referred_by', $member->referred_by) }}">
                                            @error('referred_by')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="section-title">{{ __('Profile Image') }}</div>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label>{{ __('Image') }}</label>
                                            <div id="preview" class="image-preview"
                                                @if (!empty($member->user->image)) style="background-image: url({{ asset($member->user->imageUrl) }}); background-size: cover; background-position: center center;" @endif>
                                                <label for="upload" id="label">{{ __('Image') }}</label>
                                                <input type="file" name="image" id="upload">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>
                                                <input type="hidden" value="0" name="status"
                                                    class="custom-switch-input"
                                                    @if ($member->status == 0) checked @endif>
                                                <input type="checkbox" value="1" name="status"
                                                    class="custom-switch-input"
                                                    @if ($member->status == 1) checked @endif>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{ __('Status') }}<span
                                                        class="text-danger">*</span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center col-md-8">
                                            <x-admin.update-button :text="__('Update')"></x-admin.update-button>
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

                    // remove currency icon
                    amount = amount.split('{{ currency() }}')[1];
                    $('#amount').val(amount);
                    $("#pay_amount").val(amount);
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
                        $('.account_details').show();
                        $('.transaction_id').hide();
                    } else {
                        $('.transaction_id').show();
                        $('.account_details').hide();
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
