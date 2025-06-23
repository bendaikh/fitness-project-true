<li class="nav-item dropdown {{ Route::is('admin.coupon.index') || Route::is('admin.coupon-history') ? 'active' : '' }}">
    <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-wave"></i>
        <span>{{ __('Manage Coupon') }} </span>

    </a>
    <ul class="dropdown-menu">

        @adminCan('coupon.view')
            <li class="{{ Route::is('admin.coupon.index') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.coupon.index') }}">{{ __('Coupon List') }}</a></li>
        @endadminCan
        @adminCan('coupon.history')
            <li class="{{ Route::is('admin.coupon-history') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.coupon-history') }}">{{ __('Coupon History') }}</a></li>
        @endadminCan
    </ul>
</li>
