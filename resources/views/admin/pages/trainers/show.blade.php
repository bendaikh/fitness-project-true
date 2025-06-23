@extends('admin.master_layout')
@section('title')
    <title>{{ __('Trainer Details') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Trainer Details') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.trainer.index') }}">{{ __('Trainer List') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Trainer Details') }}</div>
                </div>
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

                                @adminCan('trainer.bulk.mail')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#sendMailModal"
                                        class="btn btn-primary sendMail mb-3">{{ __('Mail To Trainer') }}</a>
                                @endadminCan
                                @if ($user->is_banned == 'yes')
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#unbannedModal"
                                        class="btn btn-warning mb-3">{{ __('Remove Banned') }}</a>
                                @else
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#bannedModal"
                                        class="btn btn-warning mb-3">{{ __('Ban Trainer') }}</a>
                                @endif

                                <a onclick="deleteData({{ $user->id }})" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    class="btn btn-danger mb-3">{{ __('Delete Trainer') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        {{-- change password card area --}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="service_card">{{ __('Change Password') }}</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.customer-password-change', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">{{ __('Password') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">{{ __('Confirm Password') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary w-100">{{ __('Change Password') }}</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="service_card">{{ __('Class History') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="30%">{{ __('Class Date') }}</th>
                                            <th width="30%">{{ __('Class Name') }}</th>
                                            <th width="20%">{{ __('Class Start') }}</th>
                                            <th width="20%">{{ __('Class End') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($workoutClasses as $history)
                                            <tr>
                                                <td>{{ $history->date }}</td>
                                                <td>{{ $history->name }}</td>
                                                <td>{{ now()->parse($history->start_at)->format('h:i A') }}</td>
                                                <td>{{ now()->parse($history->end_at)->format('h:i A') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $workoutClasses->onEachSide(3)->links() }}
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
                    <h5 class="modal-title">{{ __('Banned confirmation') }}</h5>
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
                                <label for="">{{ __('Reason') }}<span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control text-area-5" id="" cols="30" rows="10"></textarea>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Banned') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banned modal -->


    {{-- unbanned start --}}

    <div class="modal fade" id="unbannedModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Unbanned Request') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.send-unbanned-request', $user->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" name="subject">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Description') }}</label>
                                <textarea name="description" class="form-control text-area-5" id="" cols="30" rows="10"></textarea>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Unbanned') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- unbanned end --}}

    <!-- Start Verify modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Send verify link to Trainer mail') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p>{{ __('Are you sure want to send verify link to Trainer mail?') }}</p>

                        <form action="{{ route('admin.send-verify-request', $user->id) }}" method="POST">
                            @csrf

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('Send Request') }}</button>
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
                    <h5 class="modal-title">{{ __('Send mail to Trainer') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('admin.send-mail-to-customer', $user->id) }}" method="POST">
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
                    <button type="submit" class="btn btn-success">{{ __('Send Mail') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Send Mail modal -->

    @push('js')
        <script>
            "use strict";

            function deleteData(id) {
                $("#deleteForm").attr("action", '{{ route('admin.trainer.destroy', '') }}' + "/" + id)
            }
        </script>
    @endpush
@endsection
