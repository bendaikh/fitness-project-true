<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"><img class="w-100"
                    src="{{ file_exists(public_path($setting->admin_logo)) ? asset($setting->admin_logo) : asset('backend/img/admin_logo.png') }}"
                    alt="{{ $setting->app_name ?? '' }}"></a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img
                    src="{{ file_exists(public_path($setting->admin_favicon)) ? asset($setting->admin_favicon) : asset('backend/img/admin_favicon.png') }}"
                    alt="{{ $setting->app_name ?? '' }}"></a>
        </div>

        <ul class="sidebar-menu">
            @adminCan('dashboard.view')
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
            @endadminCan

            @if (checkAdminHasPermission('member.list') || checkAdminHasPermission('member.create'))
                <li class="menu-header">{{ __('Manage Members') }}</li>
                <li class="nav-item dropdown {{ Route::is('admin.members.*') ? 'active' : '' }}">
                    <a href="javascript:void()" class="nav-link has-dropdown"><i
                            class="fas fa-newspaper"></i><span>{{ __('Manage Members') }}</span></a>

                    <ul class="dropdown-menu">
                        @adminCan('member.list')
                            <li
                                class="{{ Route::is('admin.members.*') && !Route::is('admin.members.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.members.index') }}">
                                    {{ __('View Members') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('member.create')
                            <li class="{{ Route::is('admin.members.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.members.create') }}">
                                    {{ __('Add Members') }}
                                </a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif

            @adminCan('locker.list')
                <li class="{{ Route::is('admin.lockers.index') || Route::is('admin.lockers.show') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.lockers.index') }}"><i class="fas fa-door-closed"></i>
                        <span>{{ __('Lockers') }}</span>
                    </a>
                </li>
            @endadminCan

            @if (Module::isEnabled('Attendance'))
                @include('attendance::sidebar')
            @endif

            @if (isShopActive())
                @if (checkAdminHasPermission('product.category.view') ||
                        checkAdminHasPermission('product.brand.view') ||
                        checkAdminHasPermission('product.attribute.view') ||
                        checkAdminHasPermission('product.view'))
                    <li class="menu-header">{{ __('Manage Shop') }}</li>
                    <li
                        class="nav-item dropdown {{ Route::is('admin.category.*') || Route::is('admin.brand.*') || Route::is('admin.attribute.*') || Route::is('admin.product.*') || Route::is('admin.related-products') || Route::is('admin.product-gallery') || Route::is('admin.related-products') || Route::is('admin.product-variant') || Route::is('admin.product-variant*') ? 'active' : '' }}">
                        <a href="javascript:;" class="nav-link has-dropdown"><i
                                class="fas fa-newspaper"></i><span>{{ __('Manage Product') }}</span></a>

                        <ul class="dropdown-menu">
                            @adminCan('product.category.view')
                                <li class="{{ Route::is('admin.category.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.category.index') }}">
                                        {{ __('Category') }}
                                    </a>
                                </li>
                            @endadminCan
                            @adminCan('product.brand.view')
                                <li class="{{ Route::is('admin.brand.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.brand.index') }}">
                                        {{ __('Brand') }}
                                    </a>
                                </li>
                            @endadminCan
                            @adminCan('product.attribute.view')
                                <li class="{{ Route::is('admin.attribute.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.attribute.index') }}">
                                        {{ __('Attribute') }}
                                    </a>
                                </li>
                            @endadminCan
                            @adminCan('product.view')
                                <li
                                    class="{{ Route::is('admin.product.*') || Route::is('admin.related-products') || Route::is('admin.product-gallery') || Route::is('admin.product-variant') || Route::is('admin.product-variant*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.product.index') }}">
                                        {{ __('Product') }}
                                    </a>
                                </li>
                            @endadminCan
                        </ul>
                    </li>
                @endif
            @endif
            @if (checkAdminHasPermission('state.view') || checkAdminHasPermission('city.view'))
                <li
                    class="nav-item dropdown {{ Route::is('admin.state.*') | Route::is('admin.city.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-map-marker-alt"></i><span>{{ __('Location') }}</span></a>
                    <ul class="dropdown-menu">
                        @adminCan('state.view')
                            <li class="{{ Route::is('admin.state*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.state.index') }}">{{ __('State') }}</a>
                            </li>
                        @endadminCan
                        @adminCan('city.view')
                            <li class="{{ Route::is('admin.city*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.city.index') }}">{{ __('City') }}</a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif

            @if (isShopActive())
                @adminCan('shipping.view')
                    <li class="{{ Route::is('admin.shipping.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.shipping.index') }}"><i class="fas fa-shipping-fast"></i>
                            <span>{{ __('Shipping') }}</span>
                        </a>
                    </li>
                @endadminCan

                @if (Module::isEnabled('Tax') && checkAdminHasPermission('tax.view'))
                    @include('tax::sidebar')
                @endif
            @endif


            @if (checkAdminHasPermission('trainer.view') || checkAdminHasPermission('specialty.view'))
                <li class="menu-header">{{ __('Manage Workout') }}</li>
                <li
                    class="nav-item dropdown {{ Route::is('admin.trainer.*') || Route::is('admin.specialty.*') ? 'active' : '' }}">
                    <a href="javascript:void()" class="nav-link has-dropdown"><i
                            class="fas fa-user-graduate"></i><span>{{ __('Manage Trainer') }}</span></a>

                    <ul class="dropdown-menu">
                        @adminCan('trainer.view')
                            <li
                                class="{{ Route::is('admin.trainer.*') && !Route::is('admin.trainer.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.trainer.index') }}">
                                    {{ __('View Trainer') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('trainer.create')
                            <li class="{{ Route::is('admin.trainer.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.trainer.create') }}">
                                    {{ __('Add Trainer') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('specialty.view')
                            <li class="{{ Route::is('admin.specialty.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.specialty.index') }}">
                                    {{ __('Specialty') }}
                                </a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif
            @if (checkAdminHasPermission('activity.view') ||
                    checkAdminHasPermission('workout.view') ||
                    checkAdminHasPermission('class.view'))
                <li
                    class="nav-item dropdown {{ Route::is('admin.workout*') || Route::is('admin.activity*') || Route::is('admin.class*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-running"></i><span>{{ __('Manage Workout') }}</span></a>

                    <ul class="dropdown-menu">
                        @adminCan('activity.view')
                            <li class="{{ Route::is('admin.activity*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.activity.index') }}">
                                    {{ __('Activity') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('workout.view')
                            <li
                                class="{{ Route::is('admin.workout*') && !Route::is('admin.workout.history') && !Route::is('admin.workout.messages') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.workout.index') }}">
                                    {{ __('Workout') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('class.view')
                            <li class="{{ Route::is('admin.class*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.class.index') }}">
                                    {{ __('Classes') }}
                                </a>
                            </li>
                        @endadminCan

                        @adminCan('workout.view')
                            <li class="{{ Route::is('admin.workout.history') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.workout.history') }}">
                                    {{ __('Workout Enrolled') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('workout.view')
                            <li class="{{ Route::is('admin.workout.messages') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.workout.messages') }}">
                                    {{ __('Workout Messages') }}
                                </a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif



            @if (checkAdminHasPermission('gallery.group.view') ||
                    checkAdminHasPermission('gallery.image.view') ||
                    checkAdminHasPermission('gallery.video.view'))
                <li class="menu-header">{{ __('Manage Contents') }}</li>
                <li
                    class="nav-item dropdown {{ Route::is('admin.galleryGroup.*') || Route::is('admin.galleryImage.*') || Route::is('admin.galleryVideo.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-photo-video"></i><span>{{ __('Manage Gallery') }}</span></a>

                    <ul class="dropdown-menu">
                        @adminCan('gallery.group.view')
                            <li class="{{ Route::is('admin.galleryGroup.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.galleryGroup.index') }}">
                                    {{ __('Gallery Group') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('gallery.image.view')
                            <li class="{{ Route::is('admin.galleryImage.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.galleryImage.index') }}">
                                    {{ __('Gallery Image') }}
                                </a>
                            </li>
                        @endadminCan
                        @adminCan('gallery.video.view')
                            <li class="{{ Route::is('admin.galleryVideo.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.galleryVideo.index') }}">
                                    {{ __('Gallery Video') }}
                                </a>
                            </li>
                        @endadminCan
                    </ul>
                </li>
            @endif
            @adminCan('service.view')
                <li class="{{ Route::is('admin.service.*') && !Route::is('admin.service.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.service.index') }}"><i class="fas fa-dumbbell"></i>
                        <span>{{ __('Service') }}</span>
                    </a>
                </li>
            @endadminCan
            @adminCan('service.view')
                <li class="{{ Route::is('admin.service.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.service.contact') }}"><i class="fas fa-dumbbell"></i>
                        <span>{{ __('Service Messages') }}</span>
                    </a>
                </li>
            @endadminCan
            @adminCan('award.view')
                <li class="{{ Route::is('admin.award.*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.award.index') }}"><i class="fas fa-trophy"></i>
                        <span>{{ __('Award') }}</span>
                    </a>
                </li>
            @endadminCan
            @if (checkAdminHasPermission('website.content.view') || checkAdminHasPermission('partner.view'))
                <li class="menu-header">{{ __('Manage Website') }}</li>
                <li
                    class="nav-item dropdown {{ Route::is('admin.home-1') || Route::is('admin.slider.list') || Route::is('admin.slider.edit') || Route::is('admin.partner.*') || Route::is('admin.counter.*') || Route::is('admin.call-to-action.*') || Route::is('admin.home-2') || Route::is('admin.home-3') || Route::is('admin.section.content') || Route::is('admin.section.control') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown"><i
                            class="fas fa-columns"></i><span>{{ __('Home Pages') }}</span></a>

                    <ul class="dropdown-menu">
                        @adminCan('website.content.view')
                            <li class="{{ Route::is('admin.section.control') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.section.control') }}">
                                    {{ __('Section Control') }}
                                </a>
                            </li>
                            <li class="{{ Route::is('admin.section.content') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('admin.section.content') }}?code={{ getSessionLanguage() }}">
                                    {{ __('Section Content') }}
                                </a>
                            </li>

                            <li
                                class="{{ Route::is('admin.slider.list') || Route::is('admin.slider.edit') ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ THEME == 'all' ? route('admin.slider.list') : route('admin.slider.edit', THEME) . '?code=' . getSessionLanguage() }}">
                                    {{ __('Slider') }}
                                </a>
                            </li>

                            <li class="{{ Route::is('admin.call-to-action.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.call-to-action.index') }}">
                                    {{ __('Call To Action') }}
                                </a>
                            </li>
                        @endadminCan

                        @if (checkAdminHasPermission('partner.view'))
                            <li class="{{ Route::is('admin.partner.*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.partner.index') }}">
                                    {{ __('Partner') }}
                                </a>
                            </li>
                        @endif

                        @adminCan('counter.view')
                            @if ($setting?->home_theme == 1 || $setting?->home_theme == 'all' || $setting?->home_theme == 4)
                                <li class="{{ Route::is('admin.counter.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.counter.index') }}">
                                        {{ __('Counter') }}
                                    </a>
                                </li>
                            @endif
                        @endadminCan


                        @adminCan('website.content.view')
                            @if ($setting?->home_theme == 1 || $setting?->home_theme == 'all' || $setting?->home_theme == 4)
                                <li class="{{ Route::is('admin.home-1') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.home-1') }}?code={{ getSessionLanguage() }}">
                                        {{ __('Home Page') }}
                                        {{ $setting->home_theme == 'all' ? '1 & 4' : ($setting->home_theme == 4 ? '4' : '1') }}
                                    </a>
                                </li>
                            @endif
                            @if ($setting?->home_theme == 2 || $setting?->home_theme == 'all')
                                <li class="{{ Route::is('admin.home-2') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.home-2') }}?code={{ getSessionLanguage() }}">
                                        {{ __('Home Page') }}{{ $setting?->home_theme == 'all' ? ' 2' : '' }}
                                    </a>
                                </li>
                            @endif
                            @if ($setting?->home_theme == 3 || $setting?->home_theme == 'all')
                                <li class="{{ Route::is('admin.home-3') ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('admin.home-3') }}?code={{ getSessionLanguage() }}">
                                        {{ __('Home Page') }} {{ $setting?->home_theme == 'all' ? ' 3' : '' }}
                                    </a>
                                </li>
                            @endif
                        @endadminCan
                    </ul>
                </li>
            @endif
            @if (checkAdminHasPermission('website.content.view'))
                <li
                    class="nav-item dropdown {{ Route::is('admin.contact-page.index') || Route::is('admin.about.section.control') || Route::is('admin.about-page.index') || Route::is('admin.page-utility.*') ? 'active' : '' }}">
                    <a href="javascript:;" class="nav-link has-dropdown">
                        <i class="fas fa-th-large"></i><span>{{ __('Pages') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::is('admin.contact-page.index') ? 'active' : '' }}">
                            <a class="nav-link"
                                href="{{ route('admin.contact-page.index') }}?code={{ getSessionLanguage() }}">
                                {{ __('Contact Us') }}
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.about-page.index') ? 'active' : '' }}">
                            <a class="nav-link"
                                href="{{ route('admin.about-page.index') }}?code={{ getSessionLanguage() }}">
                                {{ __('About') }}
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.about.section.control') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.about.section.control') }}">
                                {{ __('About Section Control') }}
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.page-utility.*') ? 'active' : '' }}">
                            <a class="nav-link"
                                href="{{ route('admin.page-utility.index', ['code' => allLanguages()?->first()?->code]) }}">
                                <span>{{ __('Other Pages') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Module::isEnabled('Blog') && checkAdminHasPermission('blog.view'))
                @include('blog::sidebar')
            @endif

            @if (Module::isEnabled('Subscription') && checkAdminHasPermission('subscription.view'))
                @include('subscription::admin.sidebar')
            @endif
            @if (Module::isEnabled('Media') && checkAdminHasPermission('media.view'))
                @include('media::sidebar')
            @endif

            @if (Module::isEnabled('Customer') && checkAdminHasPermission('customer.view'))
                @include('customer::sidebar')
            @endif


            @if (Module::isEnabled('CustomMenu') && checkAdminHasPermission('menu.view'))
                @include('custommenu::sidebar')
            @endif

            @if (Module::isEnabled('PageBuilder') && checkAdminHasPermission('page.view'))
                @include('pagebuilder::sidebar')
            @endif

            @if (Module::isEnabled('Faq') && checkAdminHasPermission('faq.view'))
                @include('faq::sidebar')
            @endif
            @if (Module::isEnabled('Testimonial') && checkAdminHasPermission('testimonial.view'))
                @include('testimonial::sidebar')
            @endif

            @if (isShopActive() && (checkAdminHasPermission('coupon.view') || checkAdminHasPermission('order.view')))
                <li class="menu-header">{{ __('Manage Orders') }}</li>
            @endif

            @if (Module::isEnabled('Coupon') && checkAdminHasPermission('coupon.view'))
                @include('coupon::sidebar')
            @endif

            @if (isShopActive())
                @if (Module::isEnabled('Order') && checkAdminHasPermission('order.view'))
                    @include('order::sidebar')
                @endif
            @endif


            @if (Module::isEnabled('GlobalSetting') && checkAdminHasPermission('setting.view'))
                <li class="menu-header">{{ __('Settings') }}</li>
                <li class="{{ Route::is('admin.settings') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                </li>
            @endif

            @if (checkAdminHasPermission('newsletter.view') || checkAdminHasPermission('contact.message.view'))
                <li class="menu-header">{{ __('Utility') }}</li>

                @if (Module::isEnabled('NewsLetter') && checkAdminHasPermission('newsletter.view'))
                    @include('newsletter::sidebar')
                @endif

                @if (Module::isEnabled('ContactMessage') && checkAdminHasPermission('contact.message.view'))
                    @include('contactmessage::sidebar')
                @endif
            @endif
        </ul>

        <div class="py-3 text-center">
            <div class="btn-sm-group-vertical version_button" role="group" aria-label="Responsive button group">
                <button class="btn btn-primary logout_btn mt-2" disabled>{{ __('version') }}
                    {{ $setting->version ?? '' }}</button>
                <button class="btn btn-danger mt-2"
                    onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i></button>
            </div>
        </div>

    </aside>
</div>
