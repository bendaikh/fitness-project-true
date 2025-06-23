@php
    $header_admin = Auth::guard('admin')->user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    @yield('title')
    <link rel="icon" href="{{ asset($setting->admin_favicon) }}">
    @include('admin.partials.styles')
    @stack('css')
</head>

<body class="">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline">
                    <ul class="mx-3 navbar-nav d-flex align-items-center">
                        <li><a href="javascript:;" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="javascript:;" data-toggle="search" class="nav-link nav-link-lg d-none"><i
                                    class="fas fa-search"></i></a></li>
                        @if (Module::isEnabled('Language') && Route::has('set-language'))
                            <form id="setLanguageHeader" action="{{ route('set-language') }}">
                                <select class="bg-transparent form-control-sm border-light select_js" name="code">
                                    @forelse (allLanguages() as $language)
                                        <option class="text-dark" value="{{ $language->code }}"
                                            {{ getSessionLanguage() == $language->code ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                    @empty
                                        <option value="en" {{ getSessionLanguage() == 'en' ? 'selected' : '' }}>
                                            English
                                        </option>
                                    @endforelse
                                </select>
                            </form>
                        @endif
                        @if (count(allCurrencies()?->where('status', 'active')) > 1)
                            <form action="{{ route('set-currency') }}" class="set-currency-header">
                                <select name="currency"
                                    class="change-currency bg-transparent form-control-sm border-light ms-2 select_js">
                                    @forelse (allCurrencies()?->where('status', 'active') as $currency)
                                        <option class="text-dark" value="{{ $currency->currency_code }}"
                                            {{ getSessionCurrency() == $currency->currency_code ? 'selected' : '' }}>
                                            {{ $currency->currency_name }}
                                        </option>
                                    @empty
                                        <option value="USD" {{ getSessionCurrency() == 'USD' ? 'selected' : '' }}>
                                            {{ __('USD') }}
                                        </option>
                                    @endforelse
                                </select>
                            </form>
                        @endif
                    </ul>
                </div>
                <div class="d-none d-md-block me-auto search-box position-relative">
                    <x-admin.form-input id="search_menu" :placeholder="__('Search menu from here')" />
                    <div id="admin_menu_list" class="d-flex flex-column position-absolute d-none rounded-2">
                        @foreach (routeList() as $route_item)
                            @if (checkAdminHasPermission($route_item?->permission) || empty($route_item?->permission))
                                <a class="border-bottom {{ isRoute('admin.' . $route_item?->route, 'active') }}"
                                    href="{{ route('admin.' . $route_item?->route, $route_item?->param ?? []) }}?code={{ getSessionLanguage() }}{{ $route_item?->fragment ?? '' }}">{{ $route_item?->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <ul class="navbar-nav navbar-end me-3">
                    <li class="dropdown dropdown-list-toggle">
                        <a target="_blank" href="{{ route('website.home') }}" class="nav-link nav-link-lg">
                            <i class="fas fa-home"></i> {{ __('Visit Website') }}</i>
                        </a>
                    </li>
                    @if (isShopActive())
                        <li class="dropdown dropdown-list-toggle">
                            <a href="{{ route('admin.pos') }}" class="nav-link nav-link-lg">
                                <i class="fas fa-cart-plus"></i> {{ __('POS') }}</i>
                            </a>
                        </li>
                    @endif

                    <li class="dropdown"><a href="javascript:;" data-bs-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @if ($header_admin->image && File::exists(public_path($header_admin->image)))
                                <img alt="image" src="{{ asset($header_admin->image) }}" class="rounded-circle">
                            @else
                                <img alt="image" src="{{ asset($setting->default_avatar) }}" class="rounded-circle">
                            @endif

                            <div class="d-sm-none d-lg-inline-block">{{ $header_admin->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if (checkAdminHasPermission('admin.profile.view') || checkAdminHasPermission('admin.profile.edit'))
                                <a href="{{ route('admin.edit-profile') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-user"></i> {{ __('Profile') }}
                                </a>
                                <div class="dropdown-divider"></div>
                            @endif

                            @if (checkAdminHasPermission('setting.view') || checkAdminHasPermission('setting.update'))
                                <a href="{{ route('admin.settings') }}" class="dropdown-item has-icon">
                                    <i class="fas fa-cog"></i> {{ __('Settings') }}
                                </a>

                                <div class="dropdown-divider"></div>
                            @endif

                            <a href="javascript:;" class="dropdown-item has-icon text-danger d-flex align-items-center"
                                onclick="event.preventDefault();
                                document.getElementById('admin-logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            @if (request()->routeIs(
                    'admin.general-setting',
                    'admin.crediential-setting',
                    'admin.email-configuration',
                    'admin.edit-email-template',
                    'admin.currency.*',
                    'admin.tax.*',
                    'admin.seo-setting',
                    'admin.custom-code',
                    'admin.cache-clear',
                    'admin.database-clear',
                    'admin.admin.*',
                    'admin.languages.*',
                    'admin.basicpayment',
                    'admin.paymentgateway',
                    'admin.role.*'))
                @include('admin.settings.sidebar')
            @else
                @include('admin.sidebar')
            @endif
            @yield('admin-content')

            <footer class="main-footer">
                <div class="footer-left">
                    {{ $setting->copyright_text }}
                </div>
            </footer>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Item Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are You sure want to delete this item ?') }}</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-success"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- start admin logout form --}}
    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    {{-- end admin logout form --}}
    @include('admin.partials.javascripts')

    @stack('js')

</body>

</html>
