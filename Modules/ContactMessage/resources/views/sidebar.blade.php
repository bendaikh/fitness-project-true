
<li class="{{ Route::is('admin.contact-messages') || Route::is('admin.contact-message') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.contact-messages') }}"><i class="fas fa-envelope"></i> <span>{{ __('Contact Messages') }}</span></a></li>
