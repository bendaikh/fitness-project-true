@extends('admin.master_layout')
@section('title')
    <title>{{ __('Withdraw Details') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Withdraw Details') }}</h1>

            </div>

            <div class="section-body">
                <a href="{{ route('admin.withdraw-list') }}" class="btn btn-primary"><i class="fas fa-list"></i>
                    {{ __('Influencer withdraw') }}</a>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td width="50%">{{ __('influencer') }}</td>
                                        <td width="50%">
                                            <a
                                                href="{{ route('admin.customer-show', $withdraw->user_id) }}">{{ $withdraw?->user?->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">{{ __('Withdraw Method') }}</td>
                                        <td width="50%">{{ $withdraw->method }}</td>
                                    </tr>

                                    <tr>
                                        <td width="50%">{{ __('Withdraw Charge') }}</td>
                                        <td width="50%">{{ $withdraw->withdraw_charge }}%</td>
                                    </tr>

                                    <tr>
                                        <td width="50%">{{ __('Withdraw Charge Amount') }}</td>
                                        <td width="50%">
                                            {{ currency($withdraw->total_amount - $withdraw->withdraw_amount) }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="50%">{{ __('Total Amount') }}</td>
                                        <td width="50%">
                                            {{ currency($withdraw->total_amount) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">{{ __('Withdraw Amount') }}</td>
                                        <td width="50%">
                                            {{ currency($withdraw->withdraw_amount) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">{{ __('Status') }}</td>
                                        <td width="50%">
                                            @if ($withdraw->status == 1)
                                                <span class="badge bg-success">{{ __('Success') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('Pending') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">{{ __('Requested Date') }}</td>
                                        <td width="50%">{{ $withdraw->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                    @if ($withdraw->status == 1)
                                        <tr>
                                            <td width="50%">{{ __('Approved Date') }}</td>
                                            <td width="50%">{{ $withdraw->approved_date }}</td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td width="50%">{{ __('Account Information') }}</td>
                                        <td width="50%">
                                            {!! clean(nl2br($withdraw->account_info)) !!}
                                        </td>
                                    </tr>

                                </table>

                                @if ($withdraw->status == 'pending')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#withdrawApproved"
                                        class="btn btn-primary">{{ __('Approve withdraw') }}</i></a>
                                @endif

                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    class="btn btn-danger"
                                    onclick="deleteData({{ $withdraw->id }})">{{ __('Delete withdraw request') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="withdrawApproved">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Withdraw Approved Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are You sure approved this withdraw request ?') }}</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="{{ route('admin.approved-withdraw', $withdraw->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Approve') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        "use strict"

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/delete-withdraw/') }}' + "/" + id)
        }
    </script>
@endsection
