@extends('admin.master_layout')
@section('title')
    <title>{{ __('Update Role') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section admin_role_edit">
            <x-admin.breadcrumb title="{{ __('Update Role') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Settings') => route('admin.settings'),
                __('Manage Roles') => route('admin.role.index'),
                __('Update Role') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Update Role')" />
                                <div>
                                    @adminCan('role.view')
                                        <x-admin.back-button :href="route('admin.role.index')" />
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" action="{{ route('admin.role.update', $role->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                                    <input value="{{ $role->name }}" name="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="role_name" placeholder="{{ __('Enter name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback"
                                                            role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="permission"
                                                        class="form-label">{{ __('Permission') }}</label>
                                                    <div class="form-check mb-2">
                                                        <input
                                                            {{ App\Models\Admin::roleHasPermission($role, $permissions) ? 'checked' : '' }}
                                                            class="form-check-input" type="checkbox" id="permission_all"
                                                            value="1">
                                                        <label for="permission_all"
                                                            class="form-check-label permission_all">{{ __('All Permissions') }}</label>
                                                    </div>
                                                    <hr>
                                                    <div class="admin_role_border">
                                                        <div class="row">
                                                            @php
                                                                $i = 1;
                                                                $except = ['product', 'tax', 'shipping', 'order'];
                                                            @endphp
                                                            @foreach ($permissions as $group_name => $permissions_in_group)
                                                                @php
                                                                    $check = false;
                                                                    foreach ($except as $item) {
                                                                        if (
                                                                            str_contains(strtolower($group_name), $item)
                                                                        ) {
                                                                            $i++;
                                                                            $check = true;
                                                                            continue;
                                                                        }
                                                                    }
                                                                    if ($check) {
                                                                        $i++;
                                                                        continue;
                                                                    }
                                                                @endphp
                                                                @php $j = 1; @endphp
                                                                <div class="py-2 mb-2 col-lg-6 border-bottom">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-5 col-lg-5 col-xl-4">
                                                                            <div class="form-check mb-2">
                                                                                <input
                                                                                    {{ App\Models\Admin::roleHasPermission($role, $permissions_in_group) ? 'checked' : '' }}
                                                                                    class="form-check-input permission_group"
                                                                                    type="checkbox"
                                                                                    id="{{ $i }}management"
                                                                                    onclick="CheckPermissionByGroup('role-{{ $i }}-management-checkbox',this)"
                                                                                    value="2" name="permission_group"
                                                                                    data-role-id="{{ $i }}">
                                                                                <label for="{{ $i }}management"
                                                                                    class="custom-control-label text-capitalize">{{ $group_name }}</label>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-12 col-md-7 col-lg-7 col-xl-8 role-{{ $i }}-management-checkbox">
                                                                            @foreach ($permissions_in_group as $permission)
                                                                                <div class="form-check mb-2">
                                                                                    <input
                                                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                                        name="permissions[]"
                                                                                        class="form-check-input"
                                                                                        type="checkbox"
                                                                                        id="permission_checkbox_{{ $permission->id }}"
                                                                                        value="{{ $permission->name }}"
                                                                                        data-role-id="{{ $i }}">
                                                                                    <label
                                                                                        for="permission_checkbox_{{ $permission->id }}"
                                                                                        class="custom-control-label">
                                                                                        {{ implode(' ', array_map('ucfirst', explode('.', $permission->name))) }}
                                                                                    </label>
                                                                                </div>
                                                                                @php $j++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @php $i++; @endphp
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center col-md-8 offset-md-2">
                                                    <x-admin.update-button :text="__('Update')" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
        "use strict"
        $('input[name^="permession_group"]').on('change', function() {
            permission_all_checked();
        });

        $('#permission_all').on('click', function() {
            $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
        });

        function CheckPermissionByGroup(classname, checkthis) {
            const groupIdName = $("#" + checkthis.id);
            const classCheckBox = $('.' + classname + ' input');

            classCheckBox.prop('checked', groupIdName.prop('checked'));
        }

        $('input[name^="permissions"]').on('change', function() {
            const roleId = $(this).data('role-id');
            checkGroupName(roleId)
            permission_all_checked();
        });

        function checkGroupName(roleId) {
            const groupCheckbox = $('#' + roleId + 'management');
            const groupPermissions = $('input[name^="permissions"][data-role-id="' + roleId + '"]');
            const checkedPermissionsCount = groupPermissions.filter(':checked').length;
            const totalPermissionsCount = groupPermissions.length;
            groupCheckbox.prop('checked', checkedPermissionsCount === totalPermissionsCount);
        }

        function permission_all_checked() {
            var allCheckboxesChecked = $('input[type=checkbox]').not('#permission_all').length ===
                $('input[type=checkbox]:checked').not('#permission_all').length;
            $('#permission_all').prop('checked', allCheckboxesChecked);
        }

        $('.permession_group').each(function() {
            const roleId = $(this).data('role-id');
            checkGroupName(roleId);
        });
    </script>
@endpush
