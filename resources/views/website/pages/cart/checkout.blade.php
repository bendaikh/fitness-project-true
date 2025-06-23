@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Checkout Page')->first()->seo_title ?? '' }}
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Checkout')])

    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        CHECKOUT START
    =============================--> --}}
    <section class="wsus__checkout mt_110 xs_mt_90 pb_120 xs_pb_100">
        <div class="container">
            <div class="wsus__shipping_address mb_40">
                <h4 class="d-flex flex-wrap justify-content-between">{{ __('Billing Address') }}
                    <button data-bs-toggle="modal" data-bs-target="#addressModal" type="button"><i class="far fa-plus"></i>
                        {{ __('Add New') }}</button>
                </h4>
                <div class="row">
                    @foreach ($addresses as $index => $address)
                        <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInUp">
                            <div class="wsus__shipping_address_item">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="address-{{ $address->id }}">
                                        <input class="form-check-input" type="radio" name="address_id"
                                            id="address-{{ $address->id }}" value="{{ $address->id }}"
                                            {{ $index == 0 ? 'checked' : '' }}>

                                        {{ $address->address }}, {{ $address->city?->name }}, {{ $address->state?->name }},
                                        {{ $address->zip_code }}.
                                        @if ($address->email)
                                            <p>{{ $address->email }}</p>
                                        @endif
                                        @if ($address->phone)
                                            <p>{{ $address->phone }}</p>
                                        @endif
                                    </label>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group form-check mt_50">
                    <input type="checkbox" class="form-check-input" id="is_same" name="is_same" value="1" checked>
                    <label class="form-check-label"
                        for="is_same">{{ __('Shipping Address Same as Billing Address') }}</label>
                </div>
            </div>
            <div class="wsus__checkout_area">
                <div class="row">
                    <div class="col-lg-6 col-xl-8 wow fadeInUp">
                        <div class=" d-none billing_address_area">
                            <h4>{{ __('Shipping Details') }}</h4>
                            <form action="#" class="wsus__checkout_form billing_address">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('First Name') }}</label>
                                            <input type="text" placeholder="{{ __('First Name') }}" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Last Name') }}</label>
                                            <input type="text" placeholder="{{ __('Last Name') }}" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Email Address') }}</label>
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Phone') }} *</label>
                                            <input type="text" placeholder="{{ __('Phone') }}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('State Name') }} *</label>
                                            <select class="select_2 state" name="state">
                                                <option value="" selected disabled>{{ __('Select State') }}</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('City') }} *</label>
                                            <select class="select_2 city" name="city">
                                                <option value="" selected disabled>{{ __('Select City') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Zip / Postal Code') }} </label>
                                            <input type="text" placeholder="Zip Code" name="zip_code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-6">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Type') }} *</label>
                                            <select class="select_2" name="type">
                                                <option value="">{{ __('Select Type') }}</option>
                                                <option value="home">{{ __('Home') }}</option>
                                                <option value="office">{{ __('Office') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-12">
                                        <div class="wsus__checkout_form_input">
                                            <label>{{ __('Street address') }} *</label>
                                            <input type="text" placeholder="House number and street name" name="address">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">{{ __('Delivery / Pickup') }}</h4>
                                    <div class="wsus__check_single_form check_area">
                                        <div class="form-check">
                                            <label class="form-check-label" for="delivery">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    value="1" id="delivery">
                                                {{ __('Delivery') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Pickup">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    value="2" id="Pickup">
                                                {{ __('Pickup') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-none delivery_area_container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">{{ __('Delivery Area') }}</h4>
                                    <div class="wsus__check_single_form check_area">
                                        @php
                                            $shipping_area = session('delivery_area');
                                        @endphp
                                        @foreach ($shipping as $ship)
                                            <div class="form-check">
                                                <label class="form-check-label" for="delivery_area{{ $ship->id }}">
                                                    <input class="form-check-input" type="radio" name="delivery_area"
                                                        value="{{ $ship->id }}"
                                                        id="delivery_area{{ $ship->id }}"
                                                        @if ($shipping_area != null && $shipping_area->id == $ship->id) checked @endif>
                                                    {{ $ship->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="wsus__checkout_form_btn">
                                    <li><a href="{{ route('website.cart') }}"
                                            class="common_btn cart_list_btn common_btn_2">{{ __('Cart List') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="common_btn common_btn_2" id="continue_to_pay">
                                            {{ __('Payment') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp billing_area">
                        @include('components.billing-info', ['cart_contents' => $cart_contents])
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        CHECKOUT END
    =============================--> --}}


    <!-- Modal -->
    <div class="wsus__product_modal">
        <div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('website.user.address.store') }}" class="wsus__checkout_form"
                            id="address-form" method="POST">
                            @csrf
                            <h4>{{ __('New Address') }}</h4>
                            <div class="row">
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('First Name') }}</label>
                                        <input type="text" placeholder="{{ __('First Name') }}" name="first_name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('Last Name') }}</label>
                                        <input type="text" placeholder="{{ __('Last Name') }}" name="last_name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('Email Address') }}</label>
                                        <input type="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('Phone') }} *</label>
                                        <input type="text" placeholder="{{ __('Phone') }}" name="phone">
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label class="type_label">{{ __('State Name') }} *</label>
                                        <select class="select_js state" name="state">
                                            <option value="" selected disabled>{{ __('Select State') }}</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label class="type_label">{{ __('City') }} *</label>
                                        <select class="select_js city" name="city">
                                            <option value="" selected disabled>{{ __('Select City') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('Zip / Postal Code') }}</label>
                                        <input type="text" placeholder="Zip Code" name="zip_code">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="wsus__checkout_form_input">
                                        <label class="type_label">{{ __('Type') }} *</label>
                                        <select class="select_js" name="type">
                                            <option value="">{{ __('Select Type') }}</option>
                                            <option value="home">{{ __('Home') }}</option>
                                            <option value="office">{{ __('Office') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="wsus__checkout_form_input">
                                        <label>{{ __('Street address') }} *</label>
                                        <input type="text" placeholder="House number and street name" name="address">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="common_btn cart_list_btn common_btn_2"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="common_btn common_btn_2"
                            form="address-form">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

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
                            $('.city').html(options).niceSelect();
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(...errors) {
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                });

                $('#is_same').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('.billing_address_area').addClass('d-none');
                    } else {
                        $('.billing_address_area').removeClass('d-none');
                    }
                })
            });
        })();
    </script>


    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("input[name='address_id']").on("change", function() {
                    let isDelivered = true;
                    const address = $(this);
                    let delivery_id = $("input[name='address_id']:checked").val();

                    if (delivery_id) {
                        $.ajax({
                            type: 'post',
                            data: {
                                delivery_id: delivery_id
                            },
                            url: "{{ route('website.set.delivery.address') }}",
                            success: function(response) {
                                if (response.status == 404) {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(response) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                        })
                    }

                    if (!isDelivered) {
                        // add disabled attribute to the delivery method radio button
                        $("#delivery").prop("type", 'hidden');
                        return;
                    } else {
                        $("#delivery").prop("type", 'radio');
                    }


                    let deliveryCharge = $("input[name='address_id']:checked").data('delivery-charge');

                    let deliveryMethod = $('[name="delivery_method"]:checked').val();
                });

                $('[name="delivery_method"]').on('change', function() {
                    $('.preloader_area').removeClass('d-none')
                    let deliveryMethod = $(this).val();
                    if (deliveryMethod == 1) {
                        $('.delivery_area_container').removeClass('d-none');
                    } else {
                        $('.delivery_area_container').addClass('d-none');
                        $('[name="delivery_area"]').prop('checked', false);
                    }

                    $.ajax({
                        type: 'get',
                        data: {
                            deliveryMethod: deliveryMethod
                        },
                        url: "{{ route('website.set.delivery.method') }}",
                        success: function(response) {
                            $('.billing_area').html(response)
                            $('.preloader_area').addClass('d-none')
                        },
                        error: function(response) {
                            toastr.error("{{ __('Server error occurred') }}")
                        }
                    })
                })

                $("#continue_to_pay").on("click", function(e) {
                    e.preventDefault();

                    const deliveryMethod = $('[name="delivery_method"]:checked').val();
                    let addressId = $("input[name='address_id']:checked").val();
                    const deliveryArea = $('[name="delivery_area"]:checked').val();

                    const billingAddress = $('[name="is_same"]:checked').val();

                    if (!deliveryMethod) {
                        toastr.error("Please Select Delivery or Pickup");
                        return;
                    }

                    if (deliveryMethod == 1) {
                        if (!addressId) {
                            toastr.error('{{ __('Please Add An Address') }}');
                            return;
                        }
                        if (!deliveryArea) {
                            toastr.error('{{ __('Please Select Delivery Area') }}');
                            return;
                        }
                    }

                    if (deliveryMethod == 2) {
                        window.location.href = "{{ route('website.payment') }}";
                    }

                    let ajaxBillingData = {
                        billing_id: addressId
                    };
                    if (!billingAddress) {
                        const billingData = $('.billing_address').serializeArray()
                        const validateError = validateForm(billingData);

                        if (validateError) {
                            return;
                        } else {
                            var formData = new FormData($('.billing_address')[0]);
                            ajaxBillingData = formData;
                        }
                    }


                    $('.preloader_area').removeClass('d-none');
                    var ajaxOptions = {
                        type: 'post',
                        data: ajaxBillingData,
                        url: "{{ route('website.store.billing.address') }}",
                        success: function(response) {
                            if (response.status == 404) {
                                toastr.error(response.message);
                            } else {
                                window.location.href = "{{ route('website.payment') }}";
                            }
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(response) {
                            toastr.error(response.responseJSON.message)
                            $('.preloader_area').addClass('d-none');
                        }
                    };


                    if (billingAddress === undefined) {
                        ajaxOptions.contentType = false;
                        ajaxOptions.cache = false;
                        ajaxOptions.processData = false;
                    }

                    // Make AJAX request
                    $.ajax(ajaxOptions);

                });

                $("[name='delivery_area']").on('change', function() {
                    $('.preloader_area').removeClass('d-none')
                    let deliveryArea = $(this).val();
                    $.ajax({
                        type: 'get',
                        data: {
                            deliveryArea: deliveryArea
                        },
                        url: "{{ route('website.set.delivery.area') }}",
                        success: function(response) {
                            $('.billing_area').html(response)
                            $('.preloader_area').addClass('d-none')
                        },
                        error: function(response) {
                            toastr.error("{{ __('Server error occurred') }}")
                            $('.preloader_area').addClass('d-none')
                        }
                    })

                })

            });

            function validateForm(formData) {
                let errors = false;
                // Iterate through form fields
                $.each(formData, function(index, field) {
                    // Perform validation for each field
                    if (field.name === 'phone' && field.value.trim() === '') {
                        toastr.error("{{ __('Phone number is required') }}")

                        errors = true;
                    }
                    if (field.name === 'address' && field.value.trim() === '') {
                        toastr.error("{{ __('Address is required') }}")

                        errors = true;
                    }
                });
                if (formData.length < 8) {
                    toastr.error("{{ __('State and City is Required') }}")
                    errors = true;
                }

                return errors;
            }
        })(jQuery);
    </script>
@endpush
