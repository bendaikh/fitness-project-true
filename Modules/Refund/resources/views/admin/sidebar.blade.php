@adminCan('order.refund.history')

    <li
        class="nav-item dropdown {{ Route::is('admin.refund-request') || Route::is('admin.pending-refund-request') || Route::is('admin.show-refund-request') || Route::is('admin.rejected-refund-request') || Route::is('admin.complete-refund-request') ? 'active' : '' }}">
        <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-undo"></i>
            <span>{{ __('Manage Refund') }} </span>

        </a>
        <ul class="dropdown-menu">
            @adminCan('order.refund.history')
                <li class="{{ Route::is('admin.refund-request') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('admin.refund-request') }}">{{ __('Refund History') }}</a></li>
            @endadminCan
            @adminCan('order.refund.history')
                <li class="{{ Route::is('admin.pending-refund-request') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('admin.pending-refund-request') }}">{{ __('Pending Refund') }}</a></li>
            @endadminCan
            @adminCan('order.refund.history')
                <li class="{{ Route::is('admin.rejected-refund-request') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('admin.rejected-refund-request') }}">{{ __('Rejected Refund') }}</a></li>
            @endadminCan
            @adminCan('order.refund.history')
                <li class="{{ Route::is('admin.complete-refund-request') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('admin.complete-refund-request') }}">{{ __('Complete Refund') }}</a></li>
            @endadminCan
        </ul>
    </li>

@endadminCan
