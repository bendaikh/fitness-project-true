@extends('admin.master_layout')
@section('title')
    <title>{{ __('Wallet Details') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Wallet Details') }}</h1>
            </div>


            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">

                                        <tr>
                                            <td>{{ __('User') }}</td>
                                            <td><a
                                                    href="{{ route('admin.customer-show', $wallet_history->user_id) }}">{{ $wallet_history?->user?->name }}</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Gateway') }}</td>
                                            <td>{{ $wallet_history->payment_gateway }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Amount') }}</td>
                                            <td>{{ currency($wallet_history->amount) }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Status') }}</td>

                                            <td>
                                                @if ($wallet_history->payment_status == 'success')
                                                    <div class="badge bg-success">{{ __('Success') }}</div>
                                                @elseif ($wallet_history->payment_status == 'rejected')
                                                    <div class="badge bg-danger">{{ __('Rejected') }}</div>
                                                @else
                                                    <div class="badge bg-danger">{{ __('Pending') }}</div>
                                                @endif
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>{{ __('Transaction') }}</td>
                                            <td>{!! nl2br($wallet_history->transaction_id) !!}</td>

                                        </tr>

                                        <tr>
                                            <td>{{ __('Deposit At') }}</td>
                                            <td>{{ $wallet_history->created_at->format('H:iA, d M Y') }}</td>
                                        </tr>

                                    </table>
                                </div>

                                @if ($wallet_history->payment_status == 'pending')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#rejectWallet"
                                        class="btn btn-danger">{{ __('Make a reject') }}</a>
                                @endif

                                @if ($wallet_history->payment_status == 'rejected' || $wallet_history->payment_status == 'pending')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#approveRefund"
                                        class="btn btn-success">{{ __('Make an approved') }}</a>
                                @endif


                                <a href=""
                                    data-url="{{ route('admin.delete-wallet-history', $wallet_history->id) }}"
                                    class="btn btn-danger delete">{{ __('Delete History') }}</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="delete">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete refund request') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are You Sure to Delete this refund ?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Wallet Reject Modal -->
    <div class="modal fade" id="rejectWallet" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Payment Request Rejected') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.rejected-wallet-request', $wallet_history->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('Subject') }}</label>
                                <input type="text" name="subject" class="form-control">
                            </div>
                            @php($default_value = '[[name]]')
                            <div class="form-group">
                                <label for="">{{ __('Description') }} <span data-toggle="tooltip"
                                        data-placement="top" class="fa fa-info-circle text--primary"
                                        title="Don't remove the [[name]] keyword, user name will be dynamic using it">
                                </label>
                                <textarea name="description" class="form-control text-area-5" cols="30" rows="10">{{ 'Dear ' . $default_value }}</textarea>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--Refund Approved Modal -->
    <div class="modal fade" id="approveRefund" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Wallet payment request approval') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.approved-wallet-request', $wallet_history->id) }}" method="POST">
                            @csrf

                            {{ __('Are you sure want to approve this wallet payment request?') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Yes, Sure') }}</button>
                </div>
                </form>
            </div>
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
