@extends('admin.master_layout')
@section('title')
    <title>{{ __('Customers List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Customers List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Customers List') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    {{-- Search filter --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="{{ route('admin.all-customers') }}" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-lg-4 md-4 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 md-4 form-group">
                                            <select name="verified" id="verified" class="form-select">
                                                <option value="">{{ __('Select Verified') }}</option>
                                                <option value="1" {{ request('verified') == '1' ? 'selected' : '' }}>
                                                    {{ __('Verified') }}
                                                </option>
                                                <option value="0" {{ request('verified') == '0' ? 'selected' : '' }}>
                                                    {{ __('Non-verified') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 md-4 form-group">
                                            <select name="banned" id="banned" class="form-select">
                                                <option value="">{{ __('Select Banned') }}</option>
                                                <option value="1" {{ request('banned') == '1' ? 'selected' : '' }}>
                                                    {{ __('Banned') }}
                                                </option>
                                                <option value="0" {{ request('banned') == '0' ? 'selected' : '' }}>
                                                    {{ __('Non-banned') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 md-4 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="1" {{ request('order_by') == '1' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="0" {{ request('order_by') == '0' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 md-4 form-group">
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

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $index => $user)
                                                <tr>
                                                    <td>{{ $users->firstItem() + $index }}</td>
                                                    <td>{{ html_decode($user->name) }}</td>
                                                    <td>{{ html_decode($user->email) }}</td>
                                                    <td>
                                                        @adminCan('member.update')
                                                            <input onchange="changeStatus({{ $user->id }})"
                                                                id="status_toggle" type="checkbox"
                                                                {{ $user->status == 'active' ? 'checked' : '' }}
                                                                data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                data-offstyle="danger">
                                                        @endadminCan
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.customer-show', $user->id) }}"
                                                                class="btn btn-success btn-sm me-2"><i
                                                                    class="fas fa-eye"></i></a>

                                                            <a onclick="deleteData({{ $user->id }})"
                                                                href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal"
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Customer')" route="" create="no"
                                                    :message="__('No data found!')" colspan="6"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if (request()->get('par-page') !== 'all')
                                    <div class="float-right">
                                        {{ $users->onEachSide(3)->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


@push('js')
    <script>
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/customer-delete/') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ route('admin.customer.status', '') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    }
                },
                error: function(err) {
                    handleFetchError(err);
                }
            });
        }
    </script>
@endpush
