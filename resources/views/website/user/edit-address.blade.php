@extends('website.user.layout.layout')

@section('title', 'Edit Address')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Update Address') }}</h4>
        <form action="{{ route('website.user.update.address', $address->id) }}" class="wsus__dashboard_profile_edit_info"
            method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Your First Name" name="first_name" value="{{ $address->first_name }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Your Last Name" name="last_name" value="{{ $address->last_name }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Phone Number" name="phone" value="{{ $address->phone }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <input type="email" placeholder="Your Email" name="email" value="{{ $address->email }}">
                </div>

                <div class="col-xl-6 wow fadeInUp">
                    <select class="select_2 state" name="state">
                        <option value="" selected disabled>{{ __('Select State') }}</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" @if ($address->state_id) selected @endif>
                                {{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <select class="select_2 city" name="city">
                        <option value="" selected disabled>{{ __('Select City') }}</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @if ($address->city) selected @endif>
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <input type="text" placeholder="Zip Code" name="zip_code" value="{{ $address->zip_code }}">
                </div>
                <div class="col-xl-6 wow fadeInUp">
                    <select class="select_2" name="type">
                        <option value="">{{ __('Select Type') }}</option>
                        <option value="home" {{ $address->type == 'home' ? 'selected' : '' }}>{{ __('Home') }}
                        </option>
                        <option value="office" {{ $address->type == 'office' ? 'selected' : '' }}>{{ __('Office') }}
                        </option>

                    </select>
                </div>
                <div class="col-xl-12 wow fadeInUp">
                    <textarea rows="5" placeholder="4A, Park Street" name="address">{{ $address->address }}</textarea>
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
    @include('components.preloader')
@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';
            $(document).ready(function() {
                $('.state').on('change', function() {
                    $('.preloader_area').removeClass('d-none');
                    let state_id = $(this).val();
                    let url = "{{ route('website.getCities', ':state_id') }}";
                    url = url.replace(':state_id', state_id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            const {
                                data
                            } = response;
                            let options =
                                '<option value="" selected disabled>{{ __('Select City') }}</option>';
                            data.forEach(function(city) {
                                options +=
                                    `<option value="${city.id}">${city.name}</option>`;
                            });
                            $('.city').html(options).select2();
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(...errors) {
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                });

                $('#is_same').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.wsus__checkout_form').addClass('d-none');
                    } else {
                        $('.wsus__checkout_form').removeClass('d-none');
                    }
                })
            });
        })();
    </script>
@endpush
