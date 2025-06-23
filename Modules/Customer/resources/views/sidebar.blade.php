<li
    class="nav-item dropdown {{ Route::is('admin.all-customers') || Route::is('admin.active-customers') || Route::is('admin.non-verified-customers') || Route::is('admin.banned-customers') || Route::is('admin.customer-show') || Route::is('admin.send-bulk-mail') ? 'active' : '' }}">
    <a href="javascript:void()" class="nav-link has-dropdown"><i
            class="fas fa-users"></i><span>{{ __('Manage Customers') }}</span></a>

    <ul class="dropdown-menu">
        <li class="{{ Route::is('admin.all-customers') || Route::is('admin.customer-show') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.all-customers') }}">
                {{ __('All Customers') }}
            </a>
        </li>

        <li class="{{ Route::is('admin.active-customers') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.active-customers') }}">
                {{ __('Active Customer') }}
            </a>
        </li>



        <li class="{{ Route::is('admin.non-verified-customers') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.non-verified-customers') }}">
                {{ __('Non verified') }}
            </a>
        </li>

        <li class="{{ Route::is('admin.banned-customers') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.banned-customers') }}">
                {{ __('Banned Customer') }}
            </a>
        </li>

        <li class="{{ Route::is('admin.send-bulk-mail') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.send-bulk-mail') }}">
                {{ __('Send bulk mail') }}
            </a>
        </li>



    </ul>
</li>
