@extends('admin.master_layout')
@section('title')
    <title>{{ __('Member Details') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Member Details') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow">
                            @if ($user->imageUrl)
                                <img src="{{ asset($user->imageUrl) }}" class="w-100 profile_img">
                            @else
                                <img src="{{ asset($setting->default_avatar) }}" class="w-100 profile_img">
                            @endif

                            <div class="container my-3">
                                <h4>{{ html_decode($user->name) }}</h4>

                                @if ($user->phone)
                                    <p class="title">{{ html_decode($user->phone) }}</p>
                                @endif

                                <p class="title">{{ html_decode($user->email) }}</p>

                                <p class="title">{{ __('Joined') }} : {{ $user->created_at->format('h:iA, d M Y') }}</p>
                                <p class="title">{{ __('Locker No.') }} : {{ $member->locker_no ?: 'N/A' }}</p>

                                <p class="title">{{ __('Plan Name') }} : @if ($member?->subscription?->id != null)
                                        {{ $member?->plan?->plan_name ?: 'Trial' }}
                                    @else
                                        {{ __('N/A') }}
                                    @endif
                                </p>

                                @php
                                    $expiredDate = null;
                                @endphp

                                @if ($member->expiredDate != null)
                                    @php
                                        $expiredDate = $member->expiredDate ? now()->parse($member->expiredDate) : null;
                                        $diffInDays = $expiredDate ? now()->diffInDays($expiredDate, false) : null;
                                    @endphp
                                @endif
                                <p class="title">{{ __('Subscription Expire') }} :
                                    @if ($expiredDate)
                                        {!! $diffInDays > 0
                                            ? $expiredDate->format('d M, Y')
                                            : '<span class="text-danger fw-bold">' . __('Expired') . '</span>' !!}
                                    @else
                                        {{ __('N/A') }}
                                    @endif
                                </p>

                                @if ($user->is_banned == 'yes')
                                    <p class="title">{{ __('Banned') }} : <b>{{ __('Yes') }}</b></p>
                                @else
                                    <p class="title">{{ __('Banned') }} : <b>{{ __('No') }}</b></p>
                                @endif

                                @if ($user->email_verified_at)
                                    <p class="title">{{ __('Email verified') }} : <b>{{ __('Yes') }}</b> </p>
                                @else
                                    <p class="title">{{ __('Email verified') }} : <b>{{ __('None') }}</b> </p>

                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#verifyModal"
                                        class="btn btn-success mb-3">{{ __('Send Verify Link to Mail') }}</a>
                                @endif

                                @adminCan('subscription.assign')
                                    @if ($member?->subscription?->id == null)
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignSubscriptionModal"
                                            class="btn btn-primary mb-3">{{ __('Assign Subscription') }}</a>
                                    @else
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#subscriptionRenewModal"
                                            class="btn btn-primary mb-3" @if (isset($diffInDays) && $diffInDays > 10) disabled @endif>
                                            {{ __('Renew Subscription') }}
                                        </button>
                                    @endif
                                @endadminCan
                                @adminCan('locker.assign')
                                    @if ($member->locker_no == null)
                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignLockerModal"
                                            class="btn btn-info mb-3">
                                            {{ __('Assign A Locker') }}
                                        </a>
                                    @endif
                                @endadminCan
                                @adminCan('member.bulk.mail')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#sendMailModal"
                                        class="btn btn-primary sendMail mb-3">{{ __('Send Mail To Member') }}</a>
                                @endadminCan
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        {{-- subscription history card area --}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="service_card">{{ __('Subscription History') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20%">{{ __('Plan Name') }}</th>
                                            <th width="20%">{{ __('Type') }}</th>
                                            <th width="20%">{{ __('Start Date') }}</th>
                                            <th width="20%">{{ __('End Date') }}</th>
                                            <th width="20%">{{ __('Invoice') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($member->subscriptions as $history)
                                            <tr>
                                                <td>{{ $history->plan_name }}</td>
                                                <td>{{ ucwords($history?->subscriptionPlan?->expiration_date) }}</td>
                                                <td>{{ $history->start_date }}</td>
                                                <td>{{ $history->end_date }}</td>
                                                <td>
                                                    @if($history->invoice_pdf && \Illuminate\Support\Facades\Storage::disk('public')->exists($history->invoice_pdf))
                                                        @php
                                                            $phone = preg_replace('/[^0-9]/', '', $history->user->phone ?? '');
                                                            $waLink = 'https://wa.me/' . $phone . '?text=' . urlencode(__('Here is your invoice: ') . asset('storage/' . $history->invoice_pdf));
                                                        @endphp
                                                        <a href="{{ asset('storage/' . $history->invoice_pdf) }}" title="{{ __('Download Invoice') }}" target="_blank" style="margin-right:8px;">
                                                            <i class="fas fa-file-pdf fa-lg text-danger"></i>
                                                        </a>
                                                        <a href="{{ $waLink }}" title="{{ __('Share to WhatsApp') }}" target="_blank">
                                                            <i class="fab fa-whatsapp fa-lg text-success"></i>
                                                        </a>
                                                    @else
                                                        <span class="text-muted">{{ __('No Invoice') }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Start Banned modal -->
    <div class="modal fade" id="bannedModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Banned request confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.send-banned-request', $user->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">{{ __('Subject') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="subject">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Description') }}<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control text-area-5" id="" cols="30" rows="10"></textarea>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Send Request') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banned modal -->

    <!-- Start Verify modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Send verify link to customer mail') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p>{{ __('Are you sure want to send verify link to customer mail?') }}</p>

                        <form action="{{ route('admin.send-verify-request', $user->id) }}" method="POST">
                            @csrf

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Send Request') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Verify modal -->

    <!-- Start Send Mail modal -->
    <div class="modal fade" id="sendMailModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Send Renewal Mail to the member') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.send-mail-to-customer', $user->id) }}" method="POST"
                            id="sendMailForm">
                            @csrf

                            <div class="form-group">
                                <label for="">{{ __('Subject') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="subject"
                                    value="Please Renew Your Subscription">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Description') }}<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control text-area-5" id="" cols="30" rows="10">{{ __('Your Subscription will end at ' .now()->parse($member?->subscriptionHistory?->end_date)->format('d M, Y') .'. Please Renew Your Subscription for your healy life') }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary" form="sendMailForm">{{ __('Send Mail') }}</button>

                </div>
            </div>
        </div>
    </div>
    <!-- End Send Mail modal -->

    {{-- assign subscription modal --}}
    <div class="modal fade" id="assignSubscriptionModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Assign A Subscription') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin.members.assign.subscription') }}" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $member->id }}">
                            <input type="hidden" name="is_trial" value="0">
                            <div class="row">
                                <div class="col-12 row is_not_trial">
                                    <div class="form-group col-md-6">
                                        <label for="plan_id">{{ __('Plan') }}<span
                                                class="text-danger">*</span></label>
                                        <select name="plan_id" id="plan_id" class="form-select select2"
                                            data-control="select2" data-dropdown-parent="#assignSubscriptionModal">
                                            <option value="" disabled selected>{{ __('Select Plan') }}</option>
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}"
                                                    data-amount="{{ currency($plan->plan_price) }}">
                                                    {{ $plan->plan_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('plan_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gateway">{{ __('Payment Method') }}<span
                                                class="text-danger">*</span></label>
                                        <select name="gateway" id="gateway" class="form-select select2"
                                            data-control="select2" data-dropdown-parent="#assignSubscriptionModal">
                                            <option value="" disabled selected>{{ __('Select Gateway') }}</option>
                                            @foreach ($paymentGateways as $gateway)
                                                <option value="{{ $gateway }}">
                                                    {{ ucfirst(str_replace('_', ' ', $gateway)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('gateway')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="amount">{{ __('Amount') }}<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="amount" class="form-control" name="amount"
                                                value="{{ old('amount') }}">
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pay_amount">{{ __('Pay Amount') }}<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="pay_amount" class="form-control" name="pay_amount"
                                                value="{{ old('pay_amount') }}">
                                        </div>
                                        @error('pay_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 due_amount_container d-none ">
                                        <label for="due_amount">{{ __('Due Amount') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="due_amount" class="form-control" name="due_amount"
                                                value="{{ old('due_amount') }}" readonly>
                                        </div>
                                        @error('due_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 due_amount_container d-none ">
                                        <label for="due_at">{{ __('Due Pay At') }}</label>
                                        <input type="text" id="due_at" class="form-control datepicker"
                                            name="due_at" value="{{ old('due_at') }}" autocomplete="off">
                                        @error('due_at')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 transaction d-none">
                                        <label for="transaction">{{ __('Transection Id') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="transaction" class="form-control" name="transaction"
                                            value="{{ old('transaction') }}">
                                        @error('transaction')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 account_details d-none">
                                        <label for="account_details">{{ __('Account Details') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea name="account_details" id="account_details" cols="30" class='form-control' rows="10"></textarea>
                                        @error('account_details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Assign Subscription') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end assign subscription modal --}}


    {{-- assign locker --}}
    <div class="modal fade" id="assignLockerModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('admin.members.assign.locker') }}" method="POST">
                @csrf
                <input type="hidden" name="member_id" value="{{ $member->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Assign Locker') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="locker_no">{{ __('Locker No') }}<span
                                            class="text-danger">*</span></label>
                                    <select name="locker_no" id="locker_no" class="form-select select2"
                                        data-control="select2" data-dropdown-parent="#assignLockerModal">
                                        <option value="" disabled selected>{{ __('Select Locker') }}</option>
                                        @foreach ($lockers as $locker)
                                            <option value="{{ $locker->id }}">{{ $locker->locker_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    {{-- end assign locker --}}

    <div class="modal fade" id="subscriptionRenewModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Renew Subscription') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('admin.members.assign.subscription.renew') }}" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $member->id }}">
                            <input type="hidden" name="is_trial" value="0">
                            <div class="row">
                                <div class="col-12 row is_not_trial">
                                    <div class="form-group col-md-6">
                                        <label for="plan_id">{{ __('Plan') }}<span
                                                class="text-danger">*</span></label>
                                        <select name="plan_id" id="renew_plan_id" class="form-select select2"
                                            data-control="select2" data-dropdown-parent="#subscriptionRenewModal">
                                            <option value="" disabled selected>{{ __('Select Plan') }}</option>
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}"
                                                    data-amount="{{ currency($plan->plan_price) }}">
                                                    {{ $plan->plan_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('plan_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="gateway">{{ __('Payment Method') }}<span
                                                class="text-danger">*</span></label>
                                        <select name="gateway" id="renew_gateway" class="form-select select2"
                                            data-control="select2" data-dropdown-parent="#subscriptionRenewModal">
                                            <option value="" disabled selected>{{ __('Select Gateway') }}</option>
                                            @foreach ($paymentGateways as $gateway)
                                                <option value="{{ $gateway }}">
                                                    {{ ucfirst(str_replace('_', ' ', $gateway)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('gateway')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="amount">{{ __('Amount') }}<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="renew_amount" class="form-control" name="amount"
                                                value="{{ old('amount') }}">
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pay_amount">{{ __('Pay Amount') }}<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="renew_pay_amount" class="form-control"
                                                name="pay_amount" value="{{ old('pay_amount') }}">
                                        </div>
                                        @error('pay_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 due_amount_container d-none ">
                                        <label for="due_amount">{{ __('Due Amount') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text currency_icon">
                                                    {{ currency_icon() }}
                                                </div>
                                            </div>
                                            <input type="text" id="renew_due_amount" class="form-control"
                                                name="due_amount" value="{{ old('due_amount') }}" readonly>
                                        </div>
                                        @error('due_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 due_amount_container d-none ">
                                        <label for="due_at">{{ __('Due Pay At') }}</label>
                                        <input type="text" id="renew_due_at" class="form-control datepicker"
                                            name="due_at" value="{{ old('due_at') }}" autocomplete="off">
                                        @error('due_at')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 transaction d-none">
                                        <label for="transaction">{{ __('Transaction Id') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="renew_transaction" class="form-control"
                                            name="transaction" value="{{ old('transaction') }}">
                                        @error('transaction')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 account_details d-none">
                                        <label for="account_details">{{ __('Account Details') }}<span
                                                class="text-danger">*</span></label>
                                        <textarea name="account_details" id="renew_account_details" cols="30" class='form-control' rows="10"></textarea>
                                        @error('account_details')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Renew Subscription') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/customer-delete/') }}' + "/" + id)
        }

        $(document).ready(function() {
            $('#plan_id, #renew_plan_id').on('change', function() {

                let amount = $(this).find(':selected').data('amount');

                // remove currency icon
                amount = amount.split('{{ currency_icon() }}')[1];

                amount = amount.replace(/[^0-9.]/g, '');

                if ($(this).attr('id') == 'renew_plan_id') {
                    $('#renew_amount').val(amount);
                    $("#renew_pay_amount").val(amount);
                } else {
                    $('#amount').val(amount);
                    $("#pay_amount").val(amount);
                }

            })


            $('#pay_amount, #amount').on('keyup', function() {
                let amount = $('#amount').val();
                amount = amount.replace(/[^0-9.]/g, '');
                amount = parseFloat(amount);

                let payAmount = $('#pay_amount').val();
                payAmount = payAmount.replace(/[^0-9.]/g, '');
                payAmount = parseFloat(payAmount);
                payAmount = isNaN(payAmount) ? 0 : payAmount;
                amount = isNaN(amount) ? 0 : amount;



                let dueAmount = amount - payAmount;

                if (dueAmount > 0) {
                    // check if due has .00 value
                    if (dueAmount % 1 == 0) {
                        dueAmount += '.00'
                    }

                    $('#due_amount').val(dueAmount);
                    $('.due_amount_container').removeClass('d-none');
                } else {
                    $('.due_amount_container').addClass('d-none');
                    $('#due_amount').val(0);
                }
            })
            $('#gateway, #renew_gateway').on('change', function() {
                if ($(this).val() == 'bank_transfer') {
                    $('.account_details').removeClass('d-none');
                    $('.transaction').addClass('d-none');
                } else {
                    $('.transaction').removeClass('d-none');
                    $('.account_details').addClass('d-none');
                }
            })
        })
    </script>
@endpush
