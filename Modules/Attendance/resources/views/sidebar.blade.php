@if (Module::isEnabled('Attendance') && Route::has('admin.attendance.index'))
    @if (checkAdminHasPermission('attendance.list') || checkAdminHasPermission('attendance.create'))
        <li class="nav-item dropdown {{ Route::is('admin.attendance.*') ? 'active' : '' }}">
            <a href="javascript:void()" class="nav-link has-dropdown"><i
                    class="fas fa-address-book"></i><span>{{ __('Member Attendance') }}</span></a>

            <ul class="dropdown-menu">
                @adminCan('attendance.create')
                    <li class="{{ Route::is('admin.attendance.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.attendance.create') }}">
                            {{ __('Attendance') }}
                        </a>
                    </li>
                @endadminCan
                @adminCan('attendance.list')
                    <li class="{{ Route::is('admin.attendance.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.attendance.index') }}">
                            {{ __('Attendance Sheet') }}
                        </a>
                    </li>
                @endadminCan
            </ul>
        </li>
    @endif
@endif
