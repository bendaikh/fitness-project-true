@extends('admin.master_layout')
@section('title')
    <title>{{ __('Manage Admin') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('Manage Admin') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Manage Admin') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Manage Admin') }}</h4>
                                <div>
                                    @adminCan('admin.create')
                                        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Roles') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                @adminCan('admin.delete')
                                                    <th>{{ __('Action') }}</th>
                                                @endadminCan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($admins as $index => $admin)
                                                <tr>
                                                    <td>{{ $admins->firstItem() + $index }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>

                                                        @foreach ($admin->getRoleNames() as $role)
                                                            <span class="badge bg-success">{{ $role }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if ($admin->status == 'active')
                                                            <a href="javascript:;"
                                                                onclick="changeAdminStatus({{ $admin->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeAdminStatus({{ $admin->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    @adminCan('admin.delete')
                                                        <td>
                                                            @adminCan('admin.edit')
                                                                <a href="{{ route('admin.admin.edit', $admin->id) }}"
                                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('admin.delete')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $admin->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </td>
                                                    @endadminCan
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Admin')" route='admin.admin.create' create="yes"
                                                    :message="__('No Admin found!')" colspan="6">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $admins->onEachSide(3)->links() }}
                                    </div>
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
            $("#deleteForm").attr("action", "{{ url('admin/admin/') }}" + "/" + id)
        }

        function changeAdminStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/admin-status/') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response.message)
                },
                error: function(err) {
                    handleFetchError(err);
                }
            })
        }
    </script>
@endpush
