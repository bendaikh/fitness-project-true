@extends('website.user.layout.layout')

@section('title', 'Invoice')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Invoice') }}</h4>
        <div class="wsus__dashboard_invoice">
            <div class="row">
                <div class="col-md-5 col-xl-5 wow fadeInUp">
                    <div class="wsus__dashboard_invoice_left">
                        <h5>{{ auth('web')->user()->name }}</h5>
                        <p>{{ auth('web')->user()->email }}</p>
                        <p>{{ auth('web')->user()->phone }}</p>
                    </div>
                </div>
                <div class="col-md-2 col-xl-2 wow fadeInUp">
                    <a href="index.html" class="wsus__dashboard_invoice_logo">
                        <img src="{{ asset('website/images/invoice_logo.png') }}" alt="fitness" class="img-fluid w-100">
                    </a>
                </div>
                <div class="col-md-5 col-xl-5 wow fadeInUp">
                    <div class="wsus__dashboard_invoice_left wsus__dashboard_invoice_right">
                        <h5>{{ __('Invoice') }}: {{ $subscriptionHistory->invoice_id }}</h5>
                        <p>{{ __('Amount') }}: {{ currency($subscriptionHistory->total_amount) }}</p>
                        <p>{{ __('Payment') }}: {{ ucfirst($subscriptionHistory->payment_method) }}</p>
                        <p>{{ __('Transaction Id') }}: {{ $subscriptionHistory->transaction }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="table-responsive">
                        <table class="table">
                                <thead>
                                <tr>
                                    <th class="packages">{{ __('Package') }}</th>
                                    <th class="p_date">{{ __('Purchase Date') }}</th>
                                    <th class="e_date">{{ __('Expired Date') }}</th>
                                    <th class="amount">{{ __('Amount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="packages">
                                        {{ $subscriptionHistory->plan_name }}
                                    </td>
                                    <td class="p_date">
                                        {{ now()->parse($subscriptionHistory->start_date)->format('d-m-Y') }}</td>
                                    <td class="e_date">{{ now()->parse($subscriptionHistory->end_date)->format('d-m-Y') }}
                                    </td>
                                    <td class="price">{{ currency($subscriptionHistory->total_amount) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="total_text"><b>{{ __('Total') }}</b></td>
                                    <td colspan="3" class="total_amount">
                                        <b>{{ currency($subscriptionHistory->total_amount) }}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <a href="javascript:;" class="common_btn common_btn_2 mt_30 print_btn" onclick="window.print()"><i
                            class="fal fa-print"></i>{{ __('Print') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('website/css/print.css') }}">
@endpush
