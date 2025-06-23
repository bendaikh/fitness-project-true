<li
    class="nav-item dropdown {{ Route::is('admin.wallet-history') || Route::is('admin.pending-wallet-payment') || Route::is('admin.show-wallet-history') || Route::is('admin.rejected-wallet-payment') ? 'active' : '' }}">
    <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i>
        <span>{{ __('Manage Wallet') }} </span>

    </a>
    <ul class="dropdown-menu">
        <li class="{{ Route::is('admin.wallet-history') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.wallet-history') }}">{{ __('Wallet History') }}</a></li>

        <li class="{{ Route::is('admin.pending-wallet-payment') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.pending-wallet-payment') }}">{{ __('Pending Request') }}</a></li>

        <li class="{{ Route::is('admin.rejected-wallet-payment') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.rejected-wallet-payment') }}">{{ __('Rejected Request') }}</a></li>


    </ul>
</li>
