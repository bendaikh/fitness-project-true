<li
    class="nav-item dropdown {{ Route::is('admin.subscription-plan.*') || Route::is('admin.plan-transaction-history') || Route::is('admin.assign-plan') || Route::is('admin.purchase-history-show') || Route::is('admin.pending-plan-transaction') || Route::is('admin.subscription-history') || Route::is('admin.plan-option') || Route::is('admin.update-plan-option') ? 'active' : '' }}">
    <a href="javascript:;" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-dollar-sign"></i>
        <span>{{ __('Subscription') }}

        </span>

    </a>
    <ul class="dropdown-menu">
        <li
            class="{{ Route::is('admin.subscription-plan.*') || Route::is('admin.plan-option') || Route::is('admin.update-plan-option') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.subscription-plan.index') }}">{{ __('Subscription Plan') }}</a>
        </li>

        <li class="{{ Route::is('admin.plan-transaction-history') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.plan-transaction-history') }}">{{ __('Transaction History') }}</a></li>

        <li class="{{ Route::is('admin.pending-plan-transaction') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('admin.pending-plan-transaction') }}">{{ __('Pending Transaction') }}</a></li>
    </ul>
</li>
