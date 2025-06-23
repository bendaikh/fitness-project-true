<li class="{{ Route::is('admin.tax.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.tax.index') }}"><i class="fas fa-percent"></i>
        <span>{{ __('Tax') }}</span>
    </a>
</li>
