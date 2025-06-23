@extends('website.user.layout.layout')

@section('title', 'Orders')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Order') }}</h4>
        <div class="wsus__dashboard_order">
            <div class="row">
                @if (!$orders->isEmpty())
                    <div class="col-12 wow fadeInUp">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">{{ __('Order Id') }}</th>
                                        <th class="package">{{ __('Date') }}</th>
                                        <th class="p_date">{{ __('Payment Status') }}</th>
                                        <th class="e_date">{{ __('Status') }}</th>
                                        <th class="price">{{ __('Amount') }}</th>
                                        <th class="action">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="serial">
                                                #{{ $order->order_id }}
                                            </td>
                                            <td class="package">
                                                <p>
                                                    {{ now()->parse($order->created_at)->format('M d, Y') }}
                                                </p>
                                            </td>
                                            <td class="p_date">
                                                <span
                                                    class="badge bg-{{ statusColor($order->payment_status) }} rounded-0 p-2">
                                                    {{ $order->payment_status }}
                                                </span>
                                            </td>
                                            <td class="e_date">
                                                <span
                                                    class="badge bg-{{ statusColor($order->delivery_status) }} rounded-0 p-2">
                                                    {{ __(getOrderStatus($order->delivery_status)) }}
                                                </span>
                                            </td>
                                            <td class="price">
                                                {{ currency($order->order_amount + $order->delivery_fee + $order->tax - $order->discount) }}
                                            </td>
                                            <td class="action">
                                                <a href="{{ route('website.user.order-details', $order->order_id) }}">
                                                    <i class="far fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', ['message' => __('No Orders Found')])
                @endif
            </div>
            @if ($orders->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $orders->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
