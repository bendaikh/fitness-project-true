<li
    class="nav-item dropdown {{ Route::is('admin.withdraw-method.*') || Route::is('admin.withdraw-list') || Route::is('admin.show-withdraw') || Route::is('admin.pending-withdraw-list') ? 'active' : '' }}">
    <a href="javascript:;" class="nav-link has-dropdown"><i
            class="far fa-newspaper"></i><span>{{ __('Withdraw Payment') }}</span></a>

    <ul class="dropdown-menu">
        <li class="{{ Route::is('admin.withdraw-method.*') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.withdraw-method.index') }}">{{ __('Withdraw Method') }}</a></li>

        <li class="{{ Route::is('admin.withdraw-list') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.withdraw-list') }}">{{ __('Withdraw list') }}</a></li>

        <li class="{{ Route::is('admin.pending-withdraw-list') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.pending-withdraw-list') }}">{{ __('Pending Withdraw') }}</a></li>

    </ul>
