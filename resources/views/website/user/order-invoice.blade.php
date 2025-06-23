@extends('website.user.layout.layout')

@section('title', 'Invoice')
@section('user-content')
    @php
        $totalAmount = $order->order_amount + $order->delivery_fee + $order->tax - $order->discount;
    @endphp
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Invoice') }}</h4>
        <div class="wsus__dashboard_invoice" id="order_invoice_print">
            <div class="row">
                <div class="col-md-5 col-xl-5 wow fadeInUp">
                    <div class="wsus__dashboard_invoice_left">
                        <b>{{ __('Billed To') }}:</b>
                        <h5>{{ auth('web')->user()->name }}</h5>
                        <p>{{ auth('web')->user()->phone }}</p>
                        <p>{{ auth('web')->user()->email }}</p>
                        <p>
                            @if ($order->billingAddress)
                                {{ $order->billingAddress->address }},
                                {{ $order->billingAddress?->city?->name }},
                                {{ $order->billingAddress?->state?->name }},
                                {{ $order->billingAddress?->zip_code }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-xl-2 wow fadeInUp">
                    <a href="index.html" class="wsus__dashboard_invoice_logo">
                        <img src="{{ asset($setting->invoice_logo) }}" alt="invoice logo" class="img-fluid w-100">
                    </a>
                </div>
                <div class="col-md-5 col-xl-5 wow fadeInUp">
                    <div class="wsus__dashboard_invoice_left wsus__dashboard_invoice_right">
                        <h5>{{ __('Invoice') }}: #{{ $order->order_id }}</h5>
                        <p>{{ __('Amount') }}: {{ currency($totalAmount) }}</p>
                        <p>{{ __('Payment') }}: {{ ucfirst($order->payment_method) }}</p>
                        @if ($order->payment_method != 'Direct Bank')
                            <p>{{ __('Transaction Id') }}: {{ $order->transaction_id }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="">{{ __('Sl') }}</th>
                                    <th class="packages">{{ __('Product Description') }}</th>
                                    <th class="p_date">{{ __('Price') }}</th>
                                    <th class="e_date">{{ __('Quantity') }}</th>
                                    <th class="amount">{{ __('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $key => $orderDetail)
                                    <tr>
                                        <td class="no">{{ $key + 1 }}</td>
                                        <td class="packages">
                                            <p>
                                                <a
                                                    href="{{ route('website.product-details', $orderDetail->product->slug) }}">
                                                    {{ $orderDetail->product_name }}
                                                </a>
                                            </p>
                                            <p>{{ $orderDetail->attributes }}</p>
                                        </td>
                                        <td class="p_date">{{ currency($orderDetail->price) }}</td>
                                        <td class="e_date">{{ $orderDetail->quantity }}</td>
                                        <td class="amount">{{ currency($orderDetail->total) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="total_text"><b>{{ __('SubTotal') }}</b></td>
                                    <td colspan="4" class="total_amount"><b>{{ currency($order->order_amount) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total_text"><b>{{ __('Discount') }}</b></td>
                                    <td colspan="4" class="total_amount"><b>-{{ currency($order->discount) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total_text"><b>{{ __('Delivery Fee') }}</b></td>
                                    <td colspan="4" class="total_amount"><b>+{{ currency($order->delivery_fee) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total_text"><b>{{ __('Tax') }}</b></td>
                                    <td colspan="4" class="total_amount"><b>+{{ currency($order->tax) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="total_text"><b>{{ __('Total') }}</b></td>
                                    <td colspan="4" class="total_amount"><b>{{ currency($totalAmount) }}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <a href="javascript:;" class="common_btn common_btn_2 mt_30 print_btn" onclick="printInvoice()"><i
                            class="fal fa-print"></i>{{ __('Print') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        'use strict'

        $(document).ready(function() {
            const mediaQueryList = window.matchMedia('print');

            function handlePrintChange(mql) {
                if (mql.matches) {
                    // Print preview is active
                    $('.wsus__dashboard_profile > div')
                        .addClass('container-fluid')
                        .removeClass('container');
                } else {
                    // Print preview is not active
                    $('.wsus__dashboard_profile > div')
                        .addClass('container')
                        .removeClass('container-fluid');
                }
            }

            // Listen for the print media query
            mediaQueryList.addListener(handlePrintChange);

            // Apply changes immediately if already in print preview
            handlePrintChange(mediaQueryList);
        });


        function printInvoice() {
            window.print();
        }
    </script>
@endpush


@push('css')
    <link rel="stylesheet" href="{{ asset('website/css/print.css') }}">
@endpush
