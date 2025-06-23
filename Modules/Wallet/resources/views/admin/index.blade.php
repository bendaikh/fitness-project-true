@extends('admin.master_layout')
@section('title')
    <title>{{ $title }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Total Deposit') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ currency($wallet_histories->sum('amount')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Success Deposit') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ currency($wallet_histories->where('payment_status', 'success')->sum('amount')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Pending Deposit') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ currency($wallet_histories->where('payment_status', 'pending')->sum('amount')) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{ __('Rejected Deposit') }}</h4>
                            </div>
                            <div class="card-body">
                                {{ currency($wallet_histories->where('payment_status', 'rejected')->sum('amount')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>{{ __('SN') }}</th>
                                            <th>{{ __('User') }}</th>
                                            <th>{{ __('Gateway') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Deposit At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($wallet_histories as $index => $wallet_history)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td><a
                                                            href="{{ route('admin.customer-show', $wallet_history->user_id) }}">{{ $wallet_history?->user?->name }}</a>
                                                    </td>

                                                    <td>{{ $wallet_history->payment_gateway }}</td>

                                                    <td>{{ currency($wallet_history->amount) }}</td>

                                                    <td>
                                                        @if ($wallet_history->payment_status == 'success')
                                                            <div class="badge bg-success">{{ __('Success') }}</div>
                                                        @elseif ($wallet_history->payment_status == 'rejected')
                                                            <div class="badge bg-danger">{{ __('Rejected') }}</div>
                                                        @else
                                                            <div class="badge bg-danger">{{ __('Pending') }}</div>
                                                        @endif
                                                    </td>

                                                    <td>{{ $wallet_history->created_at->format('H:iA, d M Y') }}</td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.show-wallet-history', $wallet_history->id) }}"
                                                                class="btn btn-primary btn-sm me-2"><i
                                                                    class="fa fa-eye"></i></a>

                                                            <a href=""
                                                                data-url="{{ route('admin.delete-wallet-history', $wallet_history->id) }}"
                                                                class="btn btn-danger btn-sm delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('')" route="" create="no"
                                                    :message="__('No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
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
                        <button type="button" class="btn btn-success"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
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
