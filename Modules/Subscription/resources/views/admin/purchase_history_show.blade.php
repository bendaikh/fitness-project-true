@extends('admin.master_layout')
@section('title')
    <title>{{ __('Transaction Details') }}</title>
@endsection
@section('admin-content')

    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Transaction Details') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Transaction History') => route('admin.plan-transaction-history'),
                __('Transaction Details') => '#',
            ]" />

            <div class="section-body">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>{{ __('User') }}</td>
                                            <td><a href="">{{ $history?->member?->user?->name }}</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Plan') }}</td>
                                            <td>{{ $history->plan_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Price') }}</td>
                                            <td>{{ currency($history->plan_price) }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Expirated Date') }}</td>
                                            <td>{{ $history->end_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Remaining day') }}</td>
                                            <td>

                                                @if ($history->end_date == 'lifetime')
                                                    {{ __('Lifetime') }}
                                                @else
                                                    @php
                                                        $date1 = new DateTime(date('Y-m-d'));
                                                        $date2 = new DateTime($history->end_date);
                                                        $interval = $date1->diff($date2);
                                                        $remaining = $interval->days;
                                                    @endphp
                                                    @if ($remaining > 0)
                                                        {{ $remaining }} {{ __('Days') }}
                                                    @else
                                                        {{ __('Expired') }}
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Payment Method') }}</td>
                                            <td>{{ $history->payment_method }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Transaction') }}</td>
                                            <td>{!! nl2br($history->transaction) !!}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Plan Status') }}</td>
                                            <td>
                                                @php
                                                    $date1 = new DateTime(date('Y-m-d'));
                                                    $date2 = new DateTime($history->end_date);
                                                    $interval = $date1->diff($date2);
                                                    $remaining = $interval->days;
                                                @endphp
                                                @if ($remaining > 0)
                                                    <span class="badge bg-success">{{ __('Active') }}</span>
                                                @else
                                                    {{ __('Expired') }}
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                {{ __('Payment') }}
                                            </td>
                                            <td>
                                                @if ($history->payment_status == 'success')
                                                    <div class="badge bg-success">{{ __('Success') }}</div>
                                                @else
                                                    <div class="badge bg-danger">{{ __('Pending') }}</div>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <a href="" data-url="{{ route('admin.delete-plan-payment', $history->id) }}"
                                    class="btn btn-danger delete">{{ __('Delete') }}</a>

                                @if ($history->payment_status == 'pending')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#paymentUpdate"
                                        class="btn btn-primary">{{ __('Payment approved') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentUpdate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Payment Approved') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p class="text-danger">{{ __('Are you sure approved this payment ?') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>

                    <form action="{{ route('admin.approved-plan-payment', $history->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Approved') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="delete">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete Purchase History') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are You Sure to Delete this Plan?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <script>
            $(function() {
                'use strict'

                $('.delete').on('click', function(e) {
                    e.preventDefault();
                    const modal = $('#delete');
                    modal.find('form').attr('action', $(this).data('url'));
                    modal.modal('show');
                })
            })
        </script>
    @endpush

@endsection
