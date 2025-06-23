@extends('admin.master_layout')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ $title }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                $title => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    {{-- Search filter  start --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="asc" {{ request('order_by') == 'asc' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="desc"
                                                    {{ request('order_by') == 'desc' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="par-page" id="par-page" class="form-select">
                                                <option value="">{{ __('Per Page') }}</option>
                                                <option value="10" {{ '10' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('10') }}
                                                </option>
                                                <option value="50" {{ '50' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('50') }}
                                                </option>
                                                <option value="100"
                                                    {{ '100' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('100') }}
                                                </option>
                                                <option value="all"
                                                    {{ 'all' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('All') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Search filter  end --}}
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table member_table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th class="min_width">{{ __('Customer') }}</th>
                                                <th class="min_width">{{ __('Order Id') }}</th>
                                                <th class="min_width">{{ __('Date') }}</th>
                                                <th>{{ __('Quantity') }}</th>
                                                <th>{{ __('Amount') }}</th>
                                                <th>{{ __('Order Status') }}</th>
                                                <th>{{ __('Payment') }}</th>
                                                <th>{{ __('Created By') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $index => $order)
                                                <tr>
                                                    <td>{{ $orders->firstItem() + $index }}</td>
                                                    <td class="min_width">
                                                        {{ $order->user?->name ?? 'Guest' }}
                                                    </td>
                                                    <td class="min_width">{{ $order->order_id }}</td>
                                                    <td class="min_width">{{ $order->created_at->format('d F, Y') }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>{{ $order->amount }}</td>

                                                    <td>
                                                        <span
                                                            class="badge bg-{{ statusColor($order->delivery_status) }}">{{ getOrderStatus($order->delivery_status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($order->payment_status == 'success')
                                                            <span class="badge bg-success">{{ __('success') }} </span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order->createdBy)
                                                            {{ $order->createdBy?->name }}
                                                        @else
                                                            {{ __('Customer') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('order.view')
                                                                <a href="{{ route('admin.order.show', $order->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('order.delete')
                                                                <a href="javascript:;" class="btn btn-danger btn-sm me-2"
                                                                    onclick="deleteData({{ $order->order_id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('order.update')
                                                                <a href="javascript:;"
                                                                    class="btn btn-warning btn-sm status-btn me-2"
                                                                    data-id="{{ $order->order_id }}"
                                                                    data-status="{{ $order->delivery_status }}"
                                                                    data-method="{{ $order->delivery_method }}"
                                                                    data-payment="{{ $order->payment_status }}"><i
                                                                        class="fas fa-truck" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Order')" route="" create="no"
                                                    :message="__('No data found!')" colspan="10"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $orders->onEachSide(3)->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('components.admin.preloader')

    <div class="modal fade" tabindex="-1" role="dialog" id="status" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="javascript:;" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Status') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="order_id">
                        <div class="form-group">
                            <label for="delivery_status">{{ __('Order Status') }}</label>
                            <select name="delivery_status" class="form-select" id="delivery_status">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_status">{{ __('Payment Status') }}</label>
                            <select name="payment_status" class="form-select" id="payment_status">
                            </select>
                        </div>
                        <div class="form-group d-none cancel_note">
                            <label for="cancel_note">{{ __('Cancel Note') }}<span class="text-danger">*</span></label>
                            <textarea name="cancel_note" class="form-control height_50" id="cancel_note"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" class="btn btn-success" id="update">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script>
            'use strict'

            $(document).ready(function() {
                $("#update").on('click', function(e) {
                    $('.preloader_area').removeClass('d-none');
                    e.preventDefault()
                    var status = $('#delivery_status').val();
                    if (status == 6) {
                        var cancel_note = $('#cancel_note').val();
                        if (cancel_note == '') {
                            toastr.error('Cancel note is required');
                            $('.preloader_area').addClass('d-none');
                            return;
                        }
                    }
                    var orderId = $('[name="order_id"]').val();
                    const payment = $('#payment_status').val();
                    $.ajax({
                        url: "{{ route('admin.order.status') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status,
                            orderId: orderId,
                            payment: payment,
                            cancel_note: cancel_note
                        },
                        success: function(response) {
                            if (response.error) {
                                toastr.error(response.error);
                                $('#status').modal('hide');
                                $('.preloader_area').addClass('d-none');
                                return;
                            }
                            toastr.success(response.success);
                            $('#status').modal('hide');
                            $('.preloader_area').addClass('d-none');
                            location.reload()
                        },
                        error: function(xhr, status, error) {
                            handleFetchError(xhr);
                            $('.preloader_area').addClass('d-none');
                        }
                    });
                });

                $('.status-btn').on('click', function(e) {

                    // get the delivery method
                    const deliveryMethod = $(this).data('method');
                    e.preventDefault();
                    const delivery_status = {
                        1: 'Pending',
                        2: 'Accepted',
                        3: 'Progress',
                        5: 'Delivered',
                        6: 'Cancelled',
                    };
                    if (deliveryMethod == 1) {
                        delivery_status[4] = 'On the way';
                    }
                    if (deliveryMethod == 2) {
                        delivery_status[4] = 'Ready for Pickup';
                        delivery_status[5] = 'Picked Up';
                    }
                    const orderId = $(this).data('id');
                    const status = $(this).data('status');
                    const payment = $(this).data('payment');
                    $('[name="order_id"]').val(orderId);

                    $('#delivery_status').empty();
                    $.each(delivery_status, function(key, value) {
                        if (status <= key) {
                            let option =
                                `<option value="${key}" ${status == key ? 'selected' : ''}>${value}</option>`;
                            if (status >= 5) {
                                if (status == 5 && key == 5) {
                                    $('#delivery_status').html(option);
                                } else if (status == 6 && key == 6) {
                                    $('#delivery_status').html(option);
                                }
                            } else {
                                $('#delivery_status').append(option);
                            }
                        }
                    });
                    const paymentStatus = [
                        'pending', 'success', 'rejected'
                    ]

                    $('#payment_status').html('');
                    $.each(paymentStatus, function(key, value) {
                        let option =
                            `<option class="text-capitalize" value="${value}" ${payment == value ? 'selected' : ''}>${capitalizeFirstLetter(value)}</option>`;

                        if (payment == 'success') {
                            if (value == 'pending' || value == 'rejected') {
                                return;
                            }
                        }
                        if (payment == 'rejected') {
                            if (value == 'success' || value == 'pending') {
                                return;
                            }
                        }

                        $('#payment_status').append(option);
                    });



                    $('#status').modal('show');
                })
                $('#delivery_status').on('change', function() {
                    if ($(this).val() == 6) {
                        $('.cancel_note').removeClass('d-none');
                    } else {
                        $('.cancel_note').addClass('d-none');
                    }
                })
            })

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

            function deleteData(id) {
                const modal = $('#deleteModal');
                const url = "{{ route('admin.order-delete', ':id') }}".replace(':id', id)
                $('#deleteForm').attr('action', url);
                modal.modal('show');
            }
        </script>
    @endpush
@endsection
