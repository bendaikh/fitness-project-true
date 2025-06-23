<li
    class="nav-item dropdown {{ Route::is('admin.orders') || Route::is('admin.order') || Route::is('admin.pending-payment') || Route::is('admin.rejected-payment') || Route::is('admin.pending-orders') || Route::is('admin.progress-order') || Route::is('admin.order.on-the-way') || Route::is('admin.order.delivered') || Route::is('admin.order.declined') || Route::is('admin.order.cash-on-delivery') || Route::is('admin.pending-payment') || Route::is('admin.rejected-payment') || Route::is('admin.order.show') ? 'active' : '' }}">
    <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-bag"></i>
        <span>{{ __('Manage Order') }} </span>

    </a>
    <ul class="dropdown-menu">
        @adminCan('order.history')
            <li class="{{ Route::is('admin.orders') || Route::is('admin.order.show') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.orders') }}">{{ __('Order History') }}</a></li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.pending-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pending-orders') }}">{{ __('Pending Orders') }}
                </a>
            </li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.progress-order') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.progress-order') }}">{{ __('Progress Orders') }}
                </a>
            </li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.order.on-the-way') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.order.on-the-way') }}">{{ __('On The Way Orders') }}
                </a>
            </li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.order.delivered') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.order.delivered') }}">{{ __('Delivered Orders') }}
                </a>
            </li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.order.declined') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.order.declined') }}">{{ __('Declined Orders') }}
                </a>
            </li>
        @endadminCan
        @adminCan('order.history')
            <li class="{{ Route::is('admin.order.cash-on-delivery') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.order.cash-on-delivery') }}">{{ __('Cash On Delivery') }}
                </a>
            </li>
        @endadminCan

        @adminCan('order.payment.history')
            <li class="{{ Route::is('admin.pending-payment') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.pending-payment') }}">{{ __('Pending Payment') }}</a></li>
        @endadminCan
        @adminCan('order.payment.history')
            <li class="{{ Route::is('admin.rejected-payment') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.rejected-payment') }}">{{ __('Rejected Payment') }}</a></li>
        @endadminCan
    </ul>
</li>
