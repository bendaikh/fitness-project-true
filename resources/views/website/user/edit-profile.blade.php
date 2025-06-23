@extends('website.user.layout.layout')

@section('title', 'Edit Profile')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Update Your Information') }}</h4>
        <form action="{{ route('website.user.update-profile') }}" class="wsus__dashboard_profile_edit_info" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Your Name" name="name" value="{{ auth('web')->user()->name }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Enter phone number" name="phone"
                        value="{{ auth('web')->user()->phone }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <select name="gender" class="select_2">
                        <option value="">
                            {{ __('Select Gender') }}
                        </option>
                        <option value="male" @if (auth('web')->user()?->gender == 'male') selected @endif>
                            {{ __('Male') }}
                        </option>
                        <option value="female" @if (auth('web')->user()?->gender == 'female') selected @endif>
                            {{ __('Female') }}
                        </option>
                    </select>
                </div>
                @if (auth('web')->user()->member)
                    <div class="col-xl-6 wow fadeInUp">
                        <input type="text" id="dob" name="dob"
                            value="{{ old('dob',$member?->dob? now()->parse($member?->dob)->format('d-m-Y'): null) }}"
                            placeholder="{{ __('Date of Birth') }}" class="datepicker" data-date-end-date="-1068d"
                            autocomplete="off">
                        @error('dob')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-xl-3">
                        <input type="text" id="height" name="height" value="{{ old('height', $member?->height) }}"
                            placeholder="{{ __('Height') }} (cm)">
                        @error('height')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-xl-3">
                        <input type="text" id="weight" name="weight" value="{{ old('weight', $member?->weight) }}"
                            placeholder="{{ __('Weight') }} (kg)" step="any">
                        @error('weight')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-3">
                        <input type="number" id="chest" name="chest" value="{{ old('chest', $member?->chest) }}"
                            placeholder="{{ __('Chest') }} (inch)"step="any">
                        @error('chest')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-3">
                        @php
                            $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                        @endphp
                        <select name="blood_group" id="blood_group" class="select_2">
                            <option value="">{{ __('Select Blood Group') }}</option>
                            @foreach ($bloodGroups as $bloodGroup)
                                <option value="{{ $bloodGroup }}" @if (old('blood_group') == $bloodGroup || $member?->blood_group == $bloodGroup) selected @endif>
                                    {{ $bloodGroup }}</option>
                            @endforeach
                        </select>
                        @error('blood_group')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-xl-4">
                        <input type="text" id="emergency_contact" name="emergency_contact"
                            value="{{ old('emergency_contact', $member?->emergency_contact) }}"
                            placeholder="{{ __('Emergency Contact Name') }}">
                        @error('emergency_contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-4">
                        <input type="tel" id="emergency_phone" name="emergency_phone"
                            value="{{ old('emergency_phone', $member?->emergency_phone) }}"
                            placeholder="{{ __('Emergency Contact Number') }}">
                        @error('emergency_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-4">
                        <input type="text" id="emergency_relation" name="emergency_relation"
                            value="{{ old('emergency_relation', $member?->emergency_relation) }}"
                            placeholder="{{ __('Relation With Member') }}">
                        @error('emergency_relation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="col-xl-12 wow fadeInUp">
                    <textarea rows="5" placeholder="4A, Park Street, Washington DC, USA." name="address">{{ auth('web')->user()->address }}</textarea>
                </div>
                <div class="col-xl-12 wow fadeInUp">
                    <ul class="d-flex flex-wrap">
                        <li><a href="{{ route('website.user.dashboard') }}"
                                class="common_btn common_btn_2">{{ __('Cancel') }}</a>
                        </li>
                        <li><button type="submit" class="common_btn common_btn_2">{{ __('Update Info') }}</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection
