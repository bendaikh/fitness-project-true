<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AddonsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
/*  Start Admin panel Controller  */
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryGroupController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\GymServiceController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\LockerController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SectionControlController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingMethodController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\UtilityController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\WorkoutClassController;
use App\Http\Controllers\Admin\WorkoutController;
use App\Http\Controllers\CallToActionController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use Modules\Installer\app\Http\Middleware\SetupMiddleware;
use Modules\Testimonial\app\Http\Controllers\TestimonialController;

/*  End Admin panel Controller  */

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['translation']], function () {
    /* Start admin auth route */
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('store-login', [AuthenticatedSessionController::class, 'store'])->name('store-login');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forget-password', [PasswordResetLinkController::class, 'custom_forget_password'])->name('forget-password');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'custom_reset_password_page'])->name('password.reset');
    Route::post('/reset-password-store/{token}', [NewPasswordController::class, 'custom_reset_password_store'])->name('password.reset-store');
    /* End admin auth route */

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('edit-profile', 'edit_profile')->name('edit-profile');
            Route::put('profile-update', 'profile_update')->name('profile-update');
            Route::put('update-password', 'update_password')->name('update-password');
        });

        // manage members
        Route::resource('/members', MemberController::class);
        Route::put('member-status/{id}', [MemberController::class, 'changeStatus'])->name('member.status');
        Route::post('/member/assign-subscription', [MemberController::class, 'assignSubscription'])->name('members.assign.subscription');
        Route::post('/member/assign-subscription/renew', [MemberController::class, 'renewSubscription'])->name('members.assign.subscription.renew');
        Route::post('/member/assign-locker', [MemberController::class, 'assignLocker'])->name('members.assign.locker');

        // locker routes
        Route::resource('lockers', LockerController::class);
        Route::put('locker-status/{id}', [LockerController::class, 'changeStatus'])->name('locker.status');
        Route::get('locker-assign/{id}', [LockerController::class, 'assignLockerView'])->name('locker.assign.view');
        Route::post('locker-assign/{id}', [LockerController::class, 'assignLocker'])->name('locker.assign');
        Route::get('locker-member/{id}', [LockerController::class, 'lockerMember'])->name('locker.member');
        Route::get('locker-available/status/{id}', [LockerController::class, 'availableStatus'])->name('locker.available');

        if (isShopActive()) {
            // Products
            Route::post('product/status/{id}', [ProductController::class, 'status'])->name('product.status');
            Route::resource('product', ProductController::class);
            Route::get('product/product-gallery/{id}', [ProductController::class, 'product_gallery'])->name('product-gallery');
            Route::post('product/product-gallery/{id}', [ProductController::class, 'product_gallery_store'])->name('product-gallery.store');

            // view
            Route::get('product/related-product/{id}', [ProductController::class, 'related_product'])->name('related-products');
            // store
            Route::post('product/related-product/{id}', [ProductController::class, 'related_product_store'])->name('store-related-products');

            Route::get('product/related-variant/{id}', [ProductController::class, 'product_variant'])->name('product-variant');

            Route::get('product/related-variant/{id}/create', [ProductController::class, 'product_variant_create'])->name('product-variant.create');

            Route::post('product/related-variant/{id}', [ProductController::class, 'product_variant_store'])->name('product-variant.store');
            Route::get('product/related-variant/edit/{variant_id}', [ProductController::class, 'product_variant_edit'])->name('product-variant.edit');
            Route::put('product/related-variant/{variant_id}', [ProductController::class, 'product_variant_update'])->name('product-variant.update');

            Route::delete('product/related-variant/{variant_id}', [ProductController::class, 'product_variant_delete'])->name('product-variant.delete');


            Route::group(['prefix' => 'products'], function () {
                Route::put('category/status/{id}', [ProductCategoryController::class, 'status'])->name('category.status');
                Route::resource('category', ProductCategoryController::class);
                Route::put('brand/status/{id}', [BrandController::class, 'status'])->name('brand.status');
                Route::resource('brand', BrandController::class);

                Route::resource('attribute', ProductAttributeController::class);
                Route::post('attribute/get-value/', [ProductAttributeController::class, 'getValue'])->name('attribute.get.value');
                Route::post('attribute/value/delete', [ProductAttributeController::class, 'deleteValue'])->name('attribute.value.delete');
                Route::post('/attribute/has-value', [ProductAttributeController::class, 'checkHasValue'])->name('attribute.has-value');
            });

            Route::resource('shipping', ShippingMethodController::class);
            Route::put('shipping/status/{id}', [ShippingMethodController::class, 'shippingStatus'])->name('shipping.status');
        }
        // locations
        Route::resource('city', CityController::class);
        Route::resource('state', StateController::class);

        // workout routes
        Route::put('trainer/status-update/{id}', [TrainerController::class, 'status']);
        Route::resource('trainer', TrainerController::class);
        Route::get('workout/history', [WorkoutController::class, 'workoutHistory'])->name('workout.history');
        Route::delete('workout/enrollment/{id}', [WorkoutController::class, 'deleteEnrollment'])->name('workout.enrollment.delete');
        Route::patch('workout/enrollment/{id}', [WorkoutController::class, 'updateEnrollmentStatus'])->name('workout.enrollment.update');
        Route::resource('workout', WorkoutController::class);

        Route::put('workout/status/{id}', [WorkoutController::class, 'status'])->name('workout.status');
        Route::get('workouts/messages', [WorkoutController::class, 'messages'])->name('workout.messages');
        Route::delete('workouts/messages/{id}', [WorkoutController::class, 'deleteMessage'])->name('workout.message.delete');
        Route::resource('specialty', SpecialtyController::class);
        Route::post('class/{id}/status', [WorkoutClassController::class, 'status'])->name('class.status');
        Route::resource('class', WorkoutClassController::class);
        Route::get('service/contact', [GymServiceController::class, 'contact'])->name('service.contact');
        Route::resource('service', GymServiceController::class);
        Route::resource('galleryGroup', GalleryGroupController::class);
        Route::put('galleryGroup/status/{id}', [GalleryGroupController::class, 'status'])->name('galleryGroup.status');
        Route::resource('galleryImage', GalleryImageController::class);
        Route::put('galleryGroup/image/status/{id}', [GalleryImageController::class, 'updateStatus'])->name('galleryImage.status');

        Route::resource('galleryVideo', VideoGalleryController::class);
        Route::put('galleryGroup/video/status/{id}', [VideoGalleryController::class, 'updateStatus'])->name('galleryVideo.status');

        Route::resource('award', AwardController::class);
        Route::put('service/status/{id}', [GymServiceController::class, 'statusUpdate'])->name('service.status');
        Route::put('award/status/{id}', [AwardController::class, 'changeStatus'])->name('award.status');

        Route::resource('activity', ActivityController::class);
        Route::group(['prefix' => "workout"], function () {
            Route::get('assign-trainer/{id}', [WorkoutController::class, 'assignTrainerView'])->name('workout.assign.trainer');
            Route::post('assign-trainer/{id}', [WorkoutController::class, 'assignTrainer'])->name('workout.assign');
            Route::get('assign-activity/{id}', [WorkoutController::class, 'assignActivityView'])->name('workout.assign.activity');
        });



        // manage website contents
        Route::get('section-control', [SectionControlController::class, 'index'])->name('section.control');
        Route::put('section-control', [SectionControlController::class, 'update'])->name('section.control.store');
        Route::get('section-content', [SectionControlController::class, 'sectionContent'])->name('section.content');
        Route::put('section-content', [SectionControlController::class, 'sectionContentUpdate'])->name('section.content.update');
        Route::get('home-1', [HomePageController::class, 'homepage_1'])->name('home-1');
        Route::get('home-2', [HomePageController::class, 'homepage_2'])->name('home-2');
        Route::get('home-3', [HomePageController::class, 'homepage_3'])->name('home-3');
        Route::get('slider/list', [HomePageController::class, 'sliderList'])->name('slider.list');
        Route::get('slider/edit/{home}', [HomePageController::class, 'sliderEdit'])->name('slider.edit');
        Route::put('home/slider', [HomePageController::class, 'sliderStore'])->name('home-slider.store');
        Route::resource('partner', PartnerController::class);
        Route::put('partner-status/{id}', [PartnerController::class, 'changeStatus'])->name('partner-status');

        Route::resource('counter', CounterController::class);
        Route::put('counter-status/{id}', [CounterController::class, 'changeStatus'])->name('counter.status');
        Route::resource('call-to-action', CallToActionController::class);
        Route::put('call-to-action-status/{id}', [CallToActionController::class, 'changeStatus'])->name('call-to-action.status');

        Route::controller(HomePageController::class)->group(function () {
            Route::put('update-about-content', 'updateAboutContent')->name('update-about-content');
            Route::post('/update-about-image', 'updateAboutImage')->name('update-about-image');
        });

        Route::get('contact-page', [ContactPageController::class, 'index'])->name('contact-page.index');
        Route::put('contact-page', [ContactPageController::class, 'update'])->name('contact-page.update');

        Route::get('about-page', [AboutUsController::class, 'index'])->name('about-page.index');
        Route::put('about-page', [AboutUsController::class, 'update'])->name('about-page.update');

        Route::get('about/section-control', [SectionControlController::class, 'aboutUs'])->name('about.section.control');
        Route::put('about/section-control', [SectionControlController::class, 'update'])->name('about.section.control.store');
        Route::get('page-utility', [UtilityController::class, 'index'])->name('page-utility.index');
        Route::put('page-utility', [UtilityController::class, 'update'])->name('page-utility.update');


        // Role routes
        Route::get('role/assign', [RolesController::class, 'assignRoleView'])->name('role.assign');
        Route::post('role/assign/{id}', [RolesController::class, 'getAdminRoles'])->name('role.assign.admin');
        Route::put('role/assign', [RolesController::class, 'assignRoleUpdate'])->name('role.assign.update');
        Route::resource('/role', RolesController::class);
        Route::resource('/role', RolesController::class);
    });
    Route::resource('admin', AdminController::class)->except('show');
    Route::put('admin-status/{id}', [AdminController::class, 'changeStatus'])->name('admin.status');
    // Settings routes
    Route::get('settings', [SettingController::class, 'settings'])->name('settings');
    Route::get('sync-modules', [AddonsController::class, 'syncModules'])->name('addons.sync');

    // fallback route
    Route::get('/404', function () {
        return view('errors.admin.404');
    })->name('404');

    Route::fallback(function () {
        return redirect()->route('admin.404');
    });
});
