@extends('admin.master_layout')
@section('title')
    <title>
        {{ __('POS') }}</title>
@endsection
@push('css')
    <style>
        .w-21 {
            width: 65px;
        }

        .cursor-pointer {
            cursor: pointer !important;
        }

        .table:not(.table-sm):not(.table-md):not(.dataTable) td,
        .table:not(.table-sm):not(.table-md):not(.dataTable) th {
            padding: 0 15px !important;
        }

        #search_btn_text {
            padding-top: 7px;
            padding-bottom: 7px;
        }

        button.create_new_user_button {
            padding-top: 7px !important;
            padding-bottom: 7px !important;
        }
    </style>
@endpush
@section('admin-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('POS') }}</h1>
            </div>

            <div class="section-body">

                <div class="row mt-4">
                    <div class="col-lg-7">
                        <div class="card position-relative">
                            <div class="card-header pb-0">
                                <form id="product_search_form" class="pos_pro_search_form w-100">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <input type="text" class="form-control rounded" name="name"
                                                placeholder="{{ __('Search here..') }}" autocomplete="off"
                                                value="{{ request()->get('name') }}">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <select name="category_id" id="category_id" class="form-select rounded select2">
                                                <option value="" selected disabled>{{ __('Select Category') }}
                                                </option>
                                                @if (request()->has('category_id'))
                                                    @foreach ($categories as $category)
                                                        <option
                                                            {{ request()->get('category_id') == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                @else
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary w-100" id="search_btn_text"><i
                                                    class="fas fa-search fa-2x fs-25"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body product_body">

                            </div>
                            @include('components.admin.preloader')
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header pb-0 pe-1 pos_sidebar_button">
                                <div class="row w-100">
                                    <div class="col-xl-9 mb-3">
                                        <select name="customer_id" id="customer_id" class="form-select rounded select2">
                                            <option value="" disabled selected>{{ __('Select Customer') }}</option>
                                            <option value="walk-in-customer">{{ __('walk-in-customer') }}</option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }} -
                                                    {{ $customer->phone }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-3">
                                        <button data-bs-toggle="modal" data-bs-target="#createNewUser" type="button"
                                            class="btn btn-primary create_new_user_button"><i class="fa fa-plus"
                                                aria-hidden="true"></i> {{ __('New') }}</button>
                                    </div>

                                    <div class="col-md-12 mt-3 address-container d-none">

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">{{ __('Delivery Type') }}</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item" title="{{ __('Pick up') }}">
                                                    <input type="radio" name="delivery_method" value="2"
                                                        class="selectgroup-input" checked>
                                                    <span class="selectgroup-button selectgroup-button-icon"><i
                                                            class="fas fa-shopping-bag"></i></span>
                                                </label>
                                                <label class="selectgroup-item" title="{{ __('Delivery') }}">
                                                    <input type="radio" name="delivery_method" value="1"
                                                        class="selectgroup-input">
                                                    <span class="selectgroup-button selectgroup-button-icon"><i
                                                            class="fas fa-shipping-fast"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="add_delivery_info d-none">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ __('Delivery Information') }}
                                    <button id="createNewAddressBtn" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div class="shopping-card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th width="35%">{{ __('Item') }}</th>
                                            <th width="30%">{{ __('Qty') }}</th>
                                            <th width="30%">{{ __('Price') }}</th>
                                            <th width="5%">{{ __('Action') }}</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $cumalitive_sub_total = 0;
                                                $total = 0;
                                                $tax = 0;
                                            @endphp
                                            @foreach ($cart_contents as $cart_index => $cart_content)
                                                @php
                                                    $tax += $cart_content['tax'] * $cart_content['qty'];
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p>{{ $cart_content['name'] }}</p>
                                                        @if (isset($cart_content['variant']))
                                                            <span>
                                                                {{ $cart_content['variant']['attribute'] }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td data-rowid="{{ $cart_content['rowid'] }}" class="px-3">
                                                        <input min="1" type="number"
                                                            value="{{ $cart_content['qty'] }}"
                                                            class="pos_input_qty form-control">
                                                    </td>

                                                    @php
                                                        $sub_total = $cart_content['sub_total'];
                                                        $cumalitive_sub_total += $sub_total;
                                                    @endphp

                                                    <td>{{ currency($sub_total) }}</td>
                                                    <td>
                                                        <a href="javascript:;"
                                                            onclick="removeCartItem('{{ $cart_content['rowid'] }}')"
                                                            class="d-block p-2 text-danger"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="w-25 font-weight-bolder">{{ __('Subtotal') . ' : ' }}</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        {{ currency_icon() }}
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control currency" id="sub_total"
                                                    value="{{ remove_icon(currency($cumalitive_sub_total ?: 0.0)) }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div
                                            class="justify-content-between align-items-center mt-3 delivery-container d-none">
                                            <div class="w-25 font-weight-bolder">{{ __('Delivery') . ' : ' }}</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        {{ currency_icon() }}
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control currency" id="delivery_fee"
                                                    placeholder="{{ __('Delivery Fee') }}" disabled>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="w-25 font-weight-bolder">{{ __('Tax') . ' : ' }}</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        {{ currency_icon() }}
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control currency" id="tax_fee"
                                                    placeholder="{{ __('Tax') }}" value="{{ $tax }}"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="w-25 font-weight-bolder">{{ __('Discount') . ' : ' }}</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text discount_icon">
                                                        {{ currency_icon() }}
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control currency" id="discount"
                                                    placeholder="{{ __('Discount') }}">
                                                <select class="selectric px-2" name="discount_type">
                                                    <option value="fixed" selected>{{ __('Fixed') }}</option>
                                                    <option value="percent">{{ __('Percent') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center my-3">
                                            <div class="w-25 font-weight-bolder">{{ __('Total') . ' : ' }}</div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        {{ currency_icon() }}
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control currency" id="total_fee"
                                                    value="{{ remove_icon(currency($cumalitive_sub_total ?: 0.0)) }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="cart_sub_total" value="{{ $cumalitive_sub_total }}">
                                </div>

                                <div>
                                    <button id="makePaymentBtn" class="btn btn-success">{{ __('Make Payment') }}</button>
                                    <a href="{{ route('admin.cart-clear') }}"
                                        class="btn btn-danger">{{ __('Reset') }}</a>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#couponModal" id="couponBtn">
                                        {{ __('Coupon') }}
                                    </button>
                                </div>

                                <form id="placeOrderForm" action="{{ route('admin.place-order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $cumalitive_sub_total }}" name="order_sub_total"
                                        id="order_sub_total">
                                    <input type="hidden" value="" name="customer_id" id="order_customer_id">
                                    <input type="hidden" value="" name="address_id" id="order_address_id">
                                    <input type="hidden" value="0.00" name="order_delivery_fee"
                                        id="order_delivery_fee">
                                    <input type="hidden" value="0.00" name="order_tax" id="order_tax">
                                    <input type="hidden" value="0.00" name="order_discount"
                                        id="order_order_discount">
                                    <input type="hidden" value="{{ $cumalitive_sub_total }}" name="order_total_fee"
                                        id="order_total_fee">

                                    <input type="hidden" value="" name="order_delivery_date">
                                    <input type="hidden" value="" name="order_payment_method">
                                    <input type="hidden" value="" name="order_payment_details">
                                    <input type="hidden" value="" name="order_payment_notes">
                                    <input type="hidden" value="" name="order_order_note">
                                    <input type="hidden" value="2" name="order_delivery_method">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog mw-100 w-75" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid load_product_modal_response">

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="couponModal" tabindex="-5" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" class="form-control" id="coupon_code" placeholder="Enter coupon code">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <button class="btn btn-success" id="apply_coupon">{{ __('Apply') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create new user modal -->
    <div class="modal pos_sidebar fade" id="createNewUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create new customer') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="createNewUserForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('First Name') }} *</label>
                                    <input class="form-control" type="text" placeholder="{{ __('First Name') }}"
                                        name="first_name" required>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('Last Name') }} *</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Last Name') }}"
                                        name="last_name" required>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">

                                    <label for="">{{ __('Phone') }} *</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Phone') }}"
                                        name="phone" required>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('Email') }}</label>
                                    <input class="form-control" type="email" placeholder="{{ __('Email') }}"
                                        name="email">
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12 form-group">
                                    <label for="">{{ __('Address') }} *</label>
                                    <textarea class="form-control h-80px" name="address" cols="3" rows="4"
                                        placeholder="{{ __('Address') }}" required></textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <div class="wsus__check_single_form check_area d-flex flex-wrap">
                                        <div class="form-check me-3">
                                            <input value="home" class="form-check-input" type="radio"
                                                name="address_type" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                {{ __('Home') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input value="office" class="form-check-input" type="radio"
                                                name="address_type" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                {{ __('Office') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <x-admin.save-button :text="__('Save Address')"></x-admin.save-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create New Address Modal -->
    <div class="modal fade" id="newAddress" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('New address') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="add_new_address_form" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="customer_id" value="" id="address_customer_id">
                                <div class="col-md-12 col-lg-12 col-xl-12 form-group">
                                    <label for="">{{ __('Address') }}<span class="text-danger">*</span></label>
                                    <textarea class="form-control h-80px" name="address" cols="3" rows="4"
                                        placeholder="{{ __('Address') }}" required></textarea>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('First Name') }} <span
                                            class="required d-none">*</span></label>
                                    <input class="form-control" type="text" placeholder="{{ __('First Name') }}"
                                        name="first_name">
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('Last Name') }} <span
                                            class="required d-none">*</span></label>
                                    <input class="form-control" type="text" placeholder="{{ __('Last Name') }}"
                                        name="last_name">
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('Phone') }}<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="{{ __('Phone') }}"
                                        name="phone" required>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6 form-group">
                                    <label for="">{{ __('Email') }}</label>
                                    <input class="form-control" type="email" placeholder="{{ __('Email') }}"
                                        name="email">
                                </div>

                                <div class="col-12 form-group">
                                    <div class="wsus__check_single_form check_area d-flex flex-wrap">
                                        <div class="form-check me-3">
                                            <label class="form-check-label" for="home">
                                                <input value="home" class="form-check-input" type="radio"
                                                    name="address_type" id="home">
                                                {{ __('Home') }}
                                            </label>
                                        </div>
                                        <div class="form-check">

                                            <label class="form-check-label" for="office">
                                                <input value="office" class="form-check-input" type="radio"
                                                    name="address_type" id="office">
                                                {{ __('Office') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <x-admin.save-button :text="__('Save Address')"></x-admin.save-button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- item details modal --}}
    <div class="modal fade" id="itemDetailsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content load_item_details_modal_response">

            </div>
        </div>
    </div>


    {{-- modal for confirm if product has different restaurnat it will reset the cart --}}

    <div class="modal fade" id="resetCartModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Reset Cart') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body
                    ">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button class="btn btn-danger modal-reset-button">{{ __('Reset') }}</button>
                </div>
            </div>
        </div>
    </div>


    {{-- create payment --}}
    <div class="modal fade" id="createPayment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog mw-100 w-75" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create Payment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker3">{{ __('Payment Choice') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="payment_method">
                                        @foreach (allPaymentMethods() as $key => $method)
                                            <option value="{{ $key }}">{{ $method }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker3">{{ __('Payment Details') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control h-80px" placeholder="{{ __('Payment Details') }}" name="payment_details"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker3">{{ __('Payment Notes') }}</label>
                                    <textarea class="form-control h-80px" placeholder="{{ __('Payment Notes') }}" name="payment_note"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picker3">{{ __('Order Notes') }}</label>
                                    <textarea class="form-control h-80px" placeholder="{{ __('Order Notes') }}" name="order_note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="placeOrderBtn">{{ __('Place Order') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                loadProudcts()

                // update pos quantity
                $(".pos_input_qty").on("change keyup", function(e) {
                    $('.preloader_area').removeClass('d-none');
                    let quantity = $(this).val();
                    let parernt_td = $(this).parents('td');
                    let rowid = parernt_td.data('rowid')

                    $.ajax({
                        type: 'get',
                        data: {
                            rowid,
                            quantity
                        },
                        url: "{{ route('admin.cart-quantity-update') }}",
                        success: function(response) {
                            $(".shopping-card-body").html(response)
                            calculateTotalFee();
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(response) {
                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }
                            $('.preloader_area').addClass('d-none');
                        }
                    });

                });

                // load customer address
                $("#customer_id").on("change", function() {
                    let customer_id = $(this).val();
                    if (customer_id == 'walk-in-customer') {
                        $('.required').removeClass('d-none');
                        $("#order_customer_id").val('walk-in-customer');
                        return;
                    }

                    if (!customer_id) {
                        return;
                    }
                    $('.required').addClass('d-none');
                    $('.preloader_area').removeClass('d-none');
                    $("#address_customer_id").val(customer_id);
                    $("#order_customer_id").val(customer_id);
                    $("#order_address_id").val('');
                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.load-customer-address', '') }}" + "/" +
                            customer_id,
                        success: function(response) {
                            $(".address-container").html(response)
                            $('.address-container').removeClass('d-none');
                            $('.preloader_area').addClass('d-none');
                            calculateTotalFee();
                        },
                        error: function(response) {
                            toastr.error("{{ __('Server error occurred') }}")
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                })

                $("#createNewAddressBtn").on("click", function() {
                    let customer_id = $("#customer_id").val();
                    if (customer_id) {
                        $("#newAddress").modal('show');
                    } else {
                        toastr.error("{{ __('Please select a customer') }}")
                    }
                })

                // add new address modal
                $("#add_new_address_form").on("submit", function(e) {
                    e.preventDefault();

                    $('.preloader_area').removeClass('d-none');
                    $.ajax({
                        type: 'POST',
                        data: $('#add_new_address_form').serialize(),
                        url: "{{ route('admin.create-new-address') }}",
                        success: function(response) {
                            console.log(response)
                            toastr.success(response.message)
                            $("#add_new_address_form").trigger("reset");
                            $(".address-container").html(response.view)
                            $("#newAddress").modal('hide');
                            $('.preloader_area').addClass('d-none');
                        },
                        error: function(response) {
                            if (response.status == 422) {
                                if (response.responseJSON.errors.first_name) toastr.error(
                                    response.responseJSON.errors.first_name[0])
                                if (response.responseJSON.errors.last_name) toastr.error(
                                    response.responseJSON.errors.last_name[0])
                                if (response.responseJSON.errors.address) toastr.error(
                                    response.responseJSON.errors.address[0])
                                if (response.responseJSON.errors.address_type) toastr.error(
                                    response.responseJSON.errors.address_type[0])
                                if (response.responseJSON.errors.delivery_area_id) toastr
                                    .error(response.responseJSON.errors.delivery_area_id[0])
                                if (response.responseJSON.errors.customer_id) toastr.error(
                                    response.responseJSON.errors.customer_id[0])

                            }

                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error(response.responseJSON.message);
                            }
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                })

                // make payment modal
                $("#makePaymentBtn").on("click", function() {

                    let customer_id = $("#order_customer_id").val();
                    if (!customer_id) {
                        toastr.error("{{ __('Please select a customer') }}")
                        return;
                    }

                    const deliveryMethod = $('[name="delivery_method"]:checked').val();
                    let address_id = $("#order_address_id").val();
                    if (!address_id && customer_id != 'walk-in-customer' && deliveryMethod == 1) {
                        toastr.error("{{ __('Please select a address') }}")
                        return;
                    }


                    // check if cart is empty
                    let cart_sub_total = $("#cart_sub_total").val();
                    if (cart_sub_total == 0) {
                        toastr.error("{{ __('Cart is empty') }}")
                        return;
                    }
                    $("#createPayment").modal('show')
                })

                // add new customer modal
                $("#createNewUserForm").on("submit", function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        data: $('#createNewUserForm').serialize(),
                        url: "{{ route('admin.create-new-customer') }}",
                        success: function(response) {
                            toastr.success(response.message)
                            $("#createNewUserForm").trigger("reset");
                            $("#createNewUser").modal('hide');

                            $("#customer_id").html(response.customer_html)

                        },
                        error: function(response) {
                            if (response.status == 422) {
                                if (response.responseJSON.errors.name) toastr.error(response
                                    .responseJSON.errors.name[0])
                                if (response.responseJSON.errors.email) toastr.error(
                                    response.responseJSON.errors.email[0])
                                if (response.responseJSON.errors.phone) toastr.error(
                                    response.responseJSON.errors.phone[0])

                            }

                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error(response.responseJSON.message);
                            }

                        }
                    });
                })

                // product search modal
                $("#product_search_form").on("submit", function(e) {
                    e.preventDefault();

                    $("#search_btn_text").html(`<div class="spinner-border" role="status" style="width:1rem; height:1rem">
                                            <span class="sr-only">Loading...</span></div>`)

                    $.ajax({
                        type: 'get',
                        data: $('#product_search_form').serialize(),
                        url: "{{ route('admin.load-products') }}",
                        success: function(response) {
                            $("#search_btn_text").html(
                                `<i class="fas fa-search fa-2x fs-25"></i>`)
                            $(".product_body").html(response)
                        },
                        error: function(response) {
                            $("#search_btn_text").html(
                                `<i class="fas fa-search fa-3x fs-25"></i>`)

                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error(response.responseJSON.message);
                            }

                        }
                    });
                })

                // palce order modal
                $('#placeOrderBtn').on('click', function() {

                    const paymentMethod = $('[name="payment_method"]').val();

                    if (!paymentMethod) {
                        toastr.error("{{ __('Please select a Payment Method') }}")
                        return;
                    }
                    const paymentDetails = $('[name="payment_details"]').val();
                    if (!paymentMethod) {
                        toastr.error("{{ __('Please select a Fill Payment Details') }}")
                        return;
                    }
                    $('[name="order_delivery_date"]').val($('[name="delivery_date"]').val())
                    $('[name="order_payment_method"]').val($('[name="payment_method"]').val());
                    $('[name="order_payment_details"]').val($('[name="payment_details"]').val());
                    $('[name="order_payment_notes"]').val($('[name="_payment_notes"]').val())
                    $('[name="order_order_note"]').val($('[name="order_note"]').val())

                    $("#placeOrderForm").submit();
                })


                $('.modal-reset-button').on('click', function() {
                    const productId = $(this).data('product-id');
                    resetCart();
                    load_product_model(productId);
                })

                $(document).on('change', '[name="discount_type"]', function() {
                    const type = $(this).val();
                    const symbol = type == 'percent' ? '%' : "{{ currency_icon() }}"
                    $('.discount_icon').html(symbol)
                })

                $(document).on('change', '#sub_total,#delivery_fee,#tax_fee,#discount,[name="discount_type"]',
                    function() {
                        calculateTotalFee()
                    })

                $('[name="delivery_method"]').on('change', function() {
                    deliveryMethod()
                })

                $('#apply_coupon').on('click', function() {
                    const couponCode = $('#coupon_code').val();
                    if (!couponCode) {
                        toastr.error("{{ __('Please enter coupon code') }}")
                        return;
                    }

                    const subtotal = $('#sub_total').val();

                    $.ajax({
                        type: 'get',
                        url: "{{ route('admin.apply-coupon') }}",
                        data: {
                            coupon: couponCode,
                            amount: subtotal.replace(/,/g, ''),
                            author_id: 0,
                        },
                        success: function(response) {
                            if (response.success == true) {
                                toastr.success(response.message)

                                $('#discount').val(response.coupon_price)

                                $('#couponModal').modal('hide');

                                $('[name="discount_type"]').val('fixed')
                                $('.discount_icon').text('{{ currency_icon() }}')
                                calculateTotalFee()
                                $('#coupon_code').val('')
                            } else {
                                toastr.error(response.message)
                            }
                        },
                        error: function(response) {
                            handleFetchError(response);
                        }
                    });
                })
            });
        })(jQuery);

        function load_product_model(product_id) {
            $('.preloader_area').removeClass('d-none');
            // check if cart has item from different restaurant using ajax request
            $.ajax({
                type: 'get',
                url: "{{ route('admin.check-cart-restaurant', '') }}" + "/" + product_id,
                success: function(response) {
                    if (response.status == true) {
                        // add product id to reset button of modal
                        $(".modal-reset-button").attr('data-product-id', product_id);
                        $("#resetCartModal").modal('show');
                        $('.preloader_area').addClass('d-none');
                    } else {
                        loadProductModal(product_id)
                    }
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                    $('.preloader_area').addClass('d-none');
                }
            });
        }

        function loadProductModal(product_id) {
            $('.preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                url: "{{ url('admin/pos/load-product-modal') }}" + "/" + product_id,
                success: function(response) {
                    $(".load_product_modal_response").html(response)
                    $("#cartModal").modal('show');
                    $('.preloader_area').addClass('d-none');
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                    $('.preloader_area').addClass('d-none');
                }
            });
        }

        function removeCartItem(rowId) {

            $.ajax({
                type: 'get',
                url: "{{ url('admin/pos/remove-cart-item') }}" + "/" + rowId,
                success: function(response) {
                    $(".shopping-card-body").html(response)

                    calculateTotalFee();
                    toastr.success("{{ __('Remove successfully') }}")
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                }
            });
        }

        function calculateTotalFee() {

            let subTotal = $('#sub_total').val() || 0;

            // remove , if exists
            if (subTotal.includes(',')) {
                subTotal = subTotal.replace(/,/g, '');
            }
            subTotal = parseFloat(subTotal);
            let deliveryFee = parseFloat($('#delivery_fee').val()) || 0;

            let tax = parseFloat($('#tax_fee').val()) || 0;
            let discount = parseFloat($('#discount').val()) || 0;
            let total = parseFloat($('#total_fee').val()) || 0;

            let discountType = $('[name="discount_type"]').val();

            if (discountType === 'percent') {
                discount = subTotal * (discount / 100);
            }

            // Calculate the total
            total = subTotal + deliveryFee + tax - discount;

            // Update the total field with the calculated value
            $('#total_fee').val(total.toFixed(2));

            $('[name="order_sub_total"]').val(subTotal);
            $('[name="order_delivery_fee"]').val(deliveryFee);
            $('[name="order_tax"]').val(tax);
            $('[name="order_discount"]').val(discount.toFixed(2));
            $('[name="order_total_fee"]').val(total.toFixed(2));
        }



        function loadProudcts() {
            $('.card.position-relative .preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                url: "{{ route('admin.load-products') }}",
                success: function(response) {
                    $(".product_body").html(response)
                    $('.card.position-relative .preloader_area').addClass('d-none');
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                    location.reload();
                },
                complete: function() {
                    $('a.nav-link.nav-link-lg[data-toggle="sidebar"]').trigger('click');
                }
            });
        }

        function loadPagination(url) {
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    $(".product_body").html(response)
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                }
            });
        }

        function viewCartDetails(id) {
            $('.preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                url: "{{ route('admin.pos-cart-item-details', '') }}" + "/" + id,
                success: function(response) {
                    $(".load_item_details_modal_response").html(response)
                    $("#itemDetailsModal").modal('show');
                    $('.preloader_area').addClass('d-none');
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                    $('.preloader_area').addClass('d-none');
                }
            });
        }

        function resetCart() {
            $.ajax({
                type: 'get',
                url: "{{ route('admin.modal-cart-clear') }}",
                success: function(response) {
                    $(".shopping-card-body").html(response)
                    calculateTotalFee();
                    toastr.success("{{ __('Cart reset successfully') }}")
                    $("#resetCartModal").modal('hide');
                },
                error: function(response) {
                    toastr.error("{{ __('Server error occurred') }}")
                }
            });
        }

        function singleAddToCart(id) {
            $('.preloader_area').removeClass('d-none');
            $.ajax({
                type: 'get',
                data: {
                    product_id: id,
                    type: 'single'
                },
                url: "{{ url('/admin/pos/add-to-cart') }}",
                success: function(response) {
                    $(".shopping-card-body").html(response)
                    toastr.success("{{ __('Item added successfully') }}")
                    calculateTotalFee();
                    $('.preloader_area').addClass('d-none');
                },
                error: function(response) {
                    if (response.status == 500) {
                        toastr.error("{{ __('Server error occurred') }}")
                    }

                    if (response.status == 403) {
                        toastr.error(response.responseJSON.message)
                    }
                    $('.preloader_area').addClass('d-none');
                }
            });
        }

        function showDeliveryInfo(show = false) {
            if (show) {
                $('.add_delivery_info').removeClass('d-none');
            } else {
                $('.add_delivery_info').addClass('d-none');
            }
        }

        function deliveryMethod() {
            const deliveryMethod = $('[name="delivery_method"]:checked').val();
            if (deliveryMethod == 1) {
                showDeliveryInfo(true)
                $('.delivery-container').removeClass('d-none');
                $('.delivery-container').addClass('d-flex ');
                $('#delivery_fee').removeAttr('disabled')
            } else {
                showDeliveryInfo()
                $('.delivery-container').addClass('d-none');
                $('.delivery-container').removeClass('d-flex ');
                $('#delivery_fee').attr('disabled', true);
            }
            $('[name="order_delivery_method"]').val(deliveryMethod);
        }
    </script>
@endpush
