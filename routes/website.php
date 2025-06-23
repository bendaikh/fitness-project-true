<?php

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\MembershipController;
use App\Http\Controllers\website\PaymentController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\TrainerController;
use App\Http\Controllers\website\UtilityController;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\website\WishlistController;
use App\Http\Controllers\website\WorkoutController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'website.', 'middleware' => ['translation', 'maintenance.mode']], function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs');
    Route::post('blog/comment/post', [WebsiteController::class, 'commentPost'])->name('comment.post');
    Route::get('/blog/{slug}', [WebsiteController::class, 'blogDetails'])->name('blog-details');
    Route::get('/privacy-policy', [UtilityController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms-conditions', [UtilityController::class, 'termsCondition'])->name('terms-conditions');

    Route::get('/about-us', [UtilityController::class, 'about_us'])->name('about-us');
    Route::get('/contact', [UtilityController::class, 'contact'])->name('contact');
    Route::get('/award', [UtilityController::class, 'award'])->name('award');
    Route::get('/faqs', [UtilityController::class, 'faqs'])->name('faqs');
    Route::get('/service', [UtilityController::class, 'service'])->name('service');
    Route::get('/service/{slug}', [UtilityController::class, 'serviceDetails'])->name('service.details');

    Route::get('pages/{slug}', [UtilityController::class, 'pages'])->name('pages');

    if (isShopActive()) {


        // Shop routes
        Route::get('/shop', [ShopController::class, 'index'])->name('shop');
        Route::get('/shop/product/{slug}', [ShopController::class, 'details'])->name("product-details");

        Route::get('/shop/product-modal/{id}', [ShopController::class, 'productModal'])->name('product-modal');

        // cart routes
        Route::get('/cart', [CartController::class, 'cart'])->name('cart');
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
        Route::get('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
        Route::get('/remove-from-cart/{rowid}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
        Route::get('/cart/clear', [CartController::class, 'clearCart'])->name("clear.cart");
        Route::get('/cart/update', [CartController::class, 'updateCartQty'])->name("update.cart");
        Route::get('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply.coupon');
    }

    Route::get('workout/apply-coupon', [CartController::class, 'workoutApplyCoupon'])->name('workout.apply.coupon');
    Route::get('workout/remove-coupon', [CartController::class, 'workoutRemoveCoupon'])->name('workout.remove.coupon');
    Route::get('/remove-coupon', [CartController::class, 'removeCoupon'])->name('remove.coupon');
    Route::get('/image-gallery', [UtilityController::class, 'imageGallery'])->name('image.gallery');
    Route::get('/video-gallery', [UtilityController::class, 'videoGallery'])->name('video.gallery');


    // Workout routes
    Route::get('/workout', [WorkoutController::class, 'index'])->name('workout');
    Route::get('/workout/{slug}', [WorkoutController::class, 'details'])->name('workout.details');
    Route::post('/workout/contact', [WorkoutController::class, 'contact'])->name('workout.contact');
    Route::get('/trainer', [TrainerController::class, 'index'])->name('trainer');
    Route::get('/trainer/{slug}', [TrainerController::class, 'details'])->name('trainer.details');

    // membership routes
    Route::get('/membership', [MembershipController::class, 'index'])->name('membership');



    // user routes

    Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth:web', 'checkBanned']], function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit-profile');
        Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');

        if (isShopActive()) {

            Route::get('/orders', [UserController::class, 'orders'])->name('orders');
            Route::get('/order/{id}', [UserController::class, 'orderDetails'])->name('order-details');
            Route::get('/order/{id}/print', [UserController::class, 'orderPrint'])->name('order-print');


            Route::get('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
            Route::get('/wishlist/store', [UserController::class, 'wishlistStore'])->name('wishlist.store');
            Route::post('/wishlist/remove/{id}', [UserController::class, 'wishlistRemove'])->name('wishlist.remove');

            Route::get('/address', [UserController::class, 'address'])->name('address');
            Route::get('/address/new', [UserController::class, 'newAddress'])->name('new.address');
            Route::post('/address', [UtilityController::class, 'storeAddress'])->name('address.store');
            Route::get('/address/edit/{id}', [UserController::class, 'editAddress'])->name('edit.address');
            Route::put('/address/update/{id}', [UtilityController::class, 'updateAddress'])->name('update.address');
            Route::get('/address/delete/{id}', [UserController::class, 'deleteAddress'])->name('delete.address');
        }

        Route::get('subscriptions/', [UserController::class, 'subscriptionHistory'])->name('subscriptions');
        Route::get('subscription/{id}', [UserController::class, 'subscriptionDetails'])->name('subscription.details');
        Route::get('subscription/invoice-print/{id}', [UserController::class, 'subscriptionInvoice'])->name('download-invoice');



        Route::get('/plan', [UserController::class, 'plan'])->name('plan');
        Route::get('/reviews', [UserController::class, 'reviews'])->name('reviews');
        Route::get('/change-password', [UserController::class, 'changePassword'])->name('change-password');
        Route::put('/update-password', [UserController::class, 'updatePassword'])->name('update-password');
        Route::post('/upload-user-avatar', [UserController::class, 'uploadUserAvatar'])->name('upload.user.avatar');



        Route::get('workout', [UserController::class, 'workoutList'])->name('workout.list');
        Route::get('/classes', [UserController::class, 'workoutClass'])->name('workout.class');
        Route::get('/classes/{id}', [UserController::class, 'workoutClassDetails'])->name('class.edit');
        Route::put('/classes/{id}', [UserController::class, 'updateWorkoutClass'])->name('update.workout.class');
        Route::get('student/list', [UserController::class, 'studentList'])->name('student.list');
    });


    Route::group(['middleware' => ['auth:web', 'checkBanned']], function () {
        if (isShopActive()) {
            Route::post('product/post-review', [ShopController::class, 'postReview'])->name('post.review');
        }
        Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
        Route::get('/payment/confirm', [PaymentController::class, 'payment'])->name('payment');
        // Route::post('bank-payment', [PaymentController::class, 'pay_via_bank'])->name('bank-payment');

        // Route::post('paystack-payment', [PaymentController::class, 'paystackPayment'])->name('paystack-payment');
        // Route::post('pay-via-flutterwave', [PaymentController::class, 'pay_via_flutterwave'])->name('pay.flutterwave.payment');
        Route::get('order-fail', [PaymentController::class, 'order_fail'])->name('order-fail');
    });
    // address
    Route::get('/get-cities-by-state/{id}', [UtilityController::class, 'getCitiesByState'])->name('getCities');

    if (isShopActive()) {
        // set.delivery.address
        Route::post('/set-delivery-address', [UtilityController::class, 'setDeliveryAddress'])->name('set.delivery.address');
        // set delivery method
        Route::get('/set-delivery-method', [UtilityController::class, 'setDeliveryMethod'])->name('set.delivery.method');

        // set set.delivery.area
        Route::get('/set-delivery-area', [UtilityController::class, 'setDeliveryArea'])->name('set.delivery.area');
        // store billing address
        Route::post('/store-billing-address', [UtilityController::class, 'storeBillingAddress'])->name('store.billing.address');
    }

    Route::get('web/set-language/{code?}', [UtilityController::class, 'setLanguage'])->name('web.set-language');
    // fallback route
    Route::get('/404', function () {
        return view('errors.website.404');
    })->name('404');

    Route::fallback(function () {
        return redirect()->route('website.404');
    });
});

// Route::group(
//     ['middleware' => ['auth:web', 'checkBanned']],
//     function () {
//         Route::post('pay-via-stripe', [PaymentController::class, 'stripe_pay'])->name('pay-via-stripe');
//         Route::get('pay-via-stripe', [PaymentController::class, 'stripe_success'])->name('stripe-success');

//         Route::get('pay-via-paypal', [PaymentController::class, 'pay_via_paypal'])->name('pay-via-paypal');

//         Route::post('pay-via-bank', [PaymentController::class, 'pay_via_bank'])->name('pay-via-bank');

//         Route::post('pay-via-razorpay', [PaymentController::class, 'pay_via_razorpay'])->name('pay-via-razorpay');

//         Route::get('pay-via-mollie', [PaymentController::class, 'pay_via_mollie'])->name('pay-via-mollie');
//         Route::get('pay-via-instamojo', [PaymentController::class, 'pay_via_instamojo'])->name('pay-via-instamojo');

//         Route::get('/payment-addon-success', [PaymentController::class, 'payment_addon_success'])->name('payment-addon-success');
//         Route::get('/payment-addon-failed', [PaymentController::class, 'payment_addon_faild'])->name('payment-addon-faild');
//     }
// );
Route::get('/maintenance-mode', function () {
    $setting = Cache::get('setting', null);
    if (!$setting?->maintenance_mode) {
        return redirect()->route('website.home');
    }

    return view('global.maintenance');
})->name('maintenance.mode');
