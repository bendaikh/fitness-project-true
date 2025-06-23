<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><img class="w-100"
                    src="{{ file_exists(public_path($setting->admin_logo)) ? asset($setting->admin_logo) : asset('backend/img/admin_logo.png') }}"
                    alt="{{ $setting->app_name ?? '' }}"></a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img
                    src="{{ file_exists(public_path($setting->admin_favicon)) ? asset($setting->admin_favicon) : asset('backend/img/admin_favicon.png') }}"
                    alt="{{ $setting->app_name ?? '' }}"></a>
        </div>

        <ul class="sidebar-menu">
            @adminCan('dashboard.view')
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
            @endadminCan

            @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('setting.view'))
                @include('globalsetting::sidebar')
            @endif


            @if (checkAdminHasPermission('basic.payment.view') || checkAdminHasPermission('payment.view'))
                <li class="nav-item dropdown {{ Route::is('admin.basicpayment') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-credit-card"></i><span>{{ __('Payment Gateway') }}</span></a>

                    <ul class="dropdown-menu">

                        @if (Module::isEnabled('BasicPayment') && checkAdminHasPermission('basic.payment.view'))
                            @include('basicpayment::sidebar')
                        @endif
                    </ul>
                </li>
            @endif

            @include('currency::sidebar')


            @if (checkAdminHasPermission('role.view') || checkAdminHasPermission('admin.view'))
                <li class="menu-header">{{ __('Administration Settings') }}</li>
                <li
                    class="nav-item dropdown {{ Route::is('admin.admin.*') || Route::is('admin.role.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-shield-alt"></i><span>{{ __('Admin & Roles') }}</span></a>
                    <ul class="dropdown-menu">
                        @adminCan('admin.view')
                            <li class="{{ Route::is('admin.admin.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.admin.index') }}">{{ __('Manage Admin') }}</a>
                            </li>
                        @endadminCan
                        @adminCan('role.view')
                            <li class="{{ Route::is('admin.role.*') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('admin.role.index') }}">{{ __('Role & Permissions') }}</a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif
        </ul>

        <div class="py-3 text-center">
            <div class="btn-group">
                <button class="btn btn-primary logout_btn" disabled>{{ __('version') }}
                    {{ $setting->version ?? '' }}</button>
                <button class="btn btn-danger"
                    onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i></button>
            </div>
        </div>

    </aside>
</div>
