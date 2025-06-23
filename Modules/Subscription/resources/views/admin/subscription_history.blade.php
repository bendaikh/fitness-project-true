@extends('admin.master_layout')
@section('title')
    <title>{{ __('Subscription History') }}</title>
@endsection
@section('admin-content')

    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Subscription History') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Subscription History') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Subscription History')" />
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Serial') }}</th>
                                                <th>{{ __('User') }}</th>
                                                <th>{{ __('Plan') }}</th>
                                                <th>{{ __('Expiration') }}</th>
                                                <th>{{ __('Remaining') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($histories as $index => $history)
                                                <tr>
                                                    <td>{{ $histories->firstItem() + $index }}</td>
                                                    <td><a href="">{{ $history?->user?->name ?? 'Guest' }}</a></td>
                                                    <td>{{ $history->plan_name }}</td>

                                                    <td>{{ $history->expiration }}</td>
                                                    <td>
                                                        @if ($history->expiration_date == 'lifetime')
                                                            {{ __('Lifetime') }}
                                                        @else
                                                            @php
                                                                $date1 = new DateTime(date('Y-m-d'));
                                                                $date2 = new DateTime($history->expiration_date);
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

                                                    <td>

                                                        @if ($history->expiration_date == 'lifetime')
                                                            <div class="badge bg-success">{{ __('Active') }}</div>
                                                        @else
                                                            @if (date('Y-m-d') <= $history->expiration_date)
                                                                <div class="badge bg-success">{{ __('Active') }}</div>
                                                            @else
                                                                <div class="badge bg-danger">{{ __('Expired') }}</div>
                                                            @endif
                                                        @endif

                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.purchase-history-show', $history->id) }}"
                                                                class="btn btn-primary btn-sm me-2"><i
                                                                    class="fa fa-eye"></i></a>

                                                            <a href="javascript:;"
                                                                data-url="{{ route('admin.plan-renew', $history->id) }}"
                                                                class="btn btn-success btn-sm plan_renew me-2"><i
                                                                    class="fa fa-sync-alt"></i></a>

                                                            <a href=""
                                                                data-url="{{ route('admin.delete-plan-payment', $history->id) }}"
                                                                class="btn btn-danger btn-sm delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Subscription')" route="" create="no"
                                                    :message="__('No data found!')" colspan="6"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if ($histories->hasPages())
                                <div class="card-footer">
                                    {{ $histories->onEachSide(3)->links() }}
                                </div>
                            @endif
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
                        <h5 class="modal-title">{{ __('Delete subscription history') }}</h5>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="plan_renew">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Subscription Renew') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are you really want to renew this subscription?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Renew') }}</button>
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

                $('.plan_renew').on('click', function(e) {
                    e.preventDefault();
                    const modal = $('#plan_renew');
                    modal.find('form').attr('action', $(this).data('url'));
                    modal.modal('show');
                })


            })
        </script>
    @endpush

@endsection
