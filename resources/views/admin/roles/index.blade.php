@extends('admin.master_layout')
@section('title')
    <title>{{ __('Manage Roles') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Role') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Settings') => route('admin.settings'),
                __('Manage Roles') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Manage Roles')" />
                                <div>
                                    @adminCan('role.create')
                                        <x-admin.add-button :href="route('admin.role.create')" />
                                    @endadminCan
                                    @if ($admins_exists)
                                        @adminCan('role.assign')
                                            <a href="{{ route('admin.role.assign') }}" class="btn btn-success"><i
                                                    class="fa fa-sync"></i> {{ __('Assign Role') }}</a>
                                        @endadminCan
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Permission') }}</th>
                                                @if (checkAdminHasPermission('role.edit') || checkAdminHasPermission('role.delete'))
                                                    <th>{{ __('Action') }}</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($roles as $role)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ ucwords($role->name) }}</td>
                                                    <td>
                                                        {{ $role?->permissions?->count() ?? 0 }}
                                                    </td>
                                                    @if (checkAdminHasPermission('role.edit') || checkAdminHasPermission('role.delete'))
                                                        <td>
                                                            @adminCan('role.edit')
                                                                <x-admin.edit-button :href="route('admin.role.edit', $role->id)" />
                                                            @endadminCan
                                                            @adminCan('role.delete')
                                                                <x-admin.delete-button :id="$role->id" onclick="deleteData" />
                                                            @endadminCan
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Role')" route="admin.role.create" create="yes"
                                                    :message="__('No data found!')" colspan="4" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $roles->onEachSide(3)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-admin.delete-modal />
@endsection

@push('js')
    <script>
        "use strict"

        function deleteData(id) {
            $("#deleteForm").attr("action", "{{ url('/admin/role/') }}" + "/" + id)
        }
    </script>
@endpush

@push('css')
    <style>
        .dd-custom-css {
            position: absolute;
            will-change: transform;
            top: 0px;
            left: 0px;
            transform: translate3d(0px, -131px, 0px);
        }

        .max-h-400 {
            min-height: 400px;
        }
    </style>
@endpush
