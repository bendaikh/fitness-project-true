@extends('website.layout.master')

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Dashboard')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================ --}}
    {{-- DASHBOARD PROFILE START --}}
    {{-- =============================--> --}}
    <section class="wsus__dashboard_profile pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3 wow fadeInUp dashboard_sidebar">
                    <div class="wsus__dashboard_sidebar">
                        <div class="wsus__dashboard_sidebar_top wow fadeInUp">
                            <div class="wsus__dashboard_profile_img">
                                <img src="{{ auth('web')->user()->imageUrl }}" alt="profile" class="img-fluid w-100">
                                <label for="profile_photo">
                                    <i class="fal fa-camera-alt" aria-hidden="true"></i></label>
                                <form id="upload_user_avatar_form" enctype="multipart/form-data" method="POST"
                                    action="{{ route('website.user.upload.user.avatar') }}">
                                    @csrf
                                    <input type="file" name="image" id="profile_photo" hidden
                                        onchange="previewThumnailImage(event)">
                                </form>
                            </div>
                            <h5>
                                {{ auth()->user()?->name }}
                            </h5>
                            <p>{{ auth()->user()?->email }}</p>
                        </div>
                        <ul class="wsus__deshboard_menu wow fadeInUp">
                            <li>
                                <a class="{{ Route::is('website.user.dashboard') || Route::is('website.user.edit-profile') ? 'active' : '' }}"
                                    href="{{ route('website.user.dashboard') }}"><i class="fas fa-user-tie"
                                        aria-hidden="true"></i>{{ __('Profile') }}</a>
                            </li>
                            @if (isShopActive())
                                <li>
                                    <a class="{{ Route::is('website.user.address') || Route::is('website.user.new.address') || Route::is('website.user.edit.address') ? 'active' : '' }}"
                                        href="{{ route('website.user.address') }}"><i
                                            class="fas fa-address-book"></i>{{ __('Address') }}</a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('website.user.orders') || Route::is('website.user.order-details') ? 'active' : '' }}"
                                        href="{{ route('website.user.orders') }}"><i class="fas fa-cart-plus"
                                            aria-hidden="true"></i>{{ __('Orders') }}</a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('website.user.wishlist') ? 'active' : '' }}"
                                        href="{{ route('website.user.wishlist') }}"><i class="fas fa-heart"
                                            aria-hidden="true"></i>{{ __('Wishlist') }}</a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type != 'trainer')
                                <li>
                                    <a class="{{ Route::is('website.user.subscriptions') || Route::is('website.user.subscription.details') ? 'active' : '' }}"
                                        href="{{ route('website.user.subscriptions') }}"><i class="fas fa-cart-plus"
                                            aria-hidden="true"></i>{{ __('Subscriptions') }}</a>
                                </li>

                                <li>
                                    <a class="{{ Route::is('website.user.plan') ? 'active' : '' }}"
                                        href="{{ route('website.user.plan') }}">
                                        <i class="fas fa-clipboard-list"></i>{{ __('Plan') }}</a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('website.user.workout.list') ? 'active' : '' }}"
                                        href="{{ route('website.user.workout.list') }}"><i
                                            class="fas fa-list"></i>{{ __('Enrolled') }}</a>
                                </li>
                            @else
                                <li>
                                    <a class="{{ Route::is('website.user.workout.class') ? 'active' : '' }}"
                                        href="{{ route('website.user.workout.class') }}"><i
                                            class="fas fa-calendar-alt"></i>{{ __('Classes') }}</a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('website.user.student.list') ? 'active' : '' }}"
                                        href="{{ route('website.user.student.list') }}"><i class="fas fa-list"
                                            aria-hidden="true"></i>{{ __('Student List') }}</a>
                                </li>
                            @endif
                            <li>
                                <a class="{{ Route::is('website.user.change-password') ? 'active' : '' }}"
                                    href="{{ route('website.user.change-password') }}"><i
                                        class="fas fa-key"></i>{{ __('Change Password') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><i class="fas fa-unlock-alt"
                                        aria-hidden="true"></i>{{ __('Log Out') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9 wow fadeInUp dashboard_content">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        DASHBOARD PROFILE END
    =============================--> --}}
@endsection


@push('scripts')
    <script>
        "use strict";

        function previewThumnailImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-user-avatar');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
            $("#upload_user_avatar_form").submit();
        };
    </script>
@endpush
