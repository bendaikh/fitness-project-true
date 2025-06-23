<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Modules\Currency\app\Models\MultiCurrency;
use Modules\GlobalSetting\app\Models\CustomCode;
use Modules\GlobalSetting\app\Models\Setting;
use Modules\Language\app\Models\Language;
use Modules\Subscription\app\Models\SubscriptionPlan;
use App\Exceptions\AccessPermissionDeniedException;
use Illuminate\Support\Facades\Route;
use Modules\GlobalSetting\app\Models\SeoSetting;

// file upload method
function file_upload($request_file, $old_file, $file_path = 'uploads/custom-images/')
{
    $extention = $request_file->getClientOriginalExtension();
    $file_name = 'wsus-img' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
    $file_name = $file_path . $file_name;
    $request_file->move(public_path($file_path), $file_name);

    if ($old_file) {
        if (File::exists(public_path($old_file))) {
            unlink(public_path($old_file));
        }
    }

    return $file_name;
}

if (!function_exists('file_delete')) {
    function file_delete($file)
    {
        if ($file && File::exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

if (!function_exists('isRoute')) {
    function isRoute(string | array $route, string $returnValue = null)
    {
        if (is_array($route)) {
            foreach ($route as $value) {
                if (Route::is($value)) {
                    return is_null($returnValue) ? true : $returnValue;
                }
            }
            return false;
        }

        if (Route::is($route)) {
            return is_null($returnValue) ? true : $returnValue;
        }

        return false;
    }
}

if (!function_exists('isLiveSite')) {
    function isLiveSite()
    {
        $isEnvProduction = app()->environment('production');
        $host = request()->getHost();
        $isLocalHost = in_array($host, ['localhost', '127.0.0.1']);

        return $isEnvProduction && !$isLocalHost;
    }
}

if (!function_exists('allCurrencies')) {
    function allCurrencies()
    {
        $allCurrencies = Cache::rememberForever('allCurrencies', function () {
            return MultiCurrency::all();
        });

        if (!$allCurrencies) {
            $allCurrencies = MultiCurrency::all();
        }

        return $allCurrencies;
    }
}

if (!function_exists('getSessionCurrency')) {
    function getSessionCurrency(): string
    {
        if (!session()->has('currency_code') || !session()->has('currency_rate') || !session()->has('currency_position')) {
            $currency = allCurrencies()->where('is_default', 'yes')->first();
            session()->put('currency_code', $currency->currency_code);
            session()->forget('currency_position');
            session()->put('currency_position', $currency->currency_position);
            session()->forget('currency_icon');
            session()->put('currency_icon', $currency->currency_icon);
            session()->forget('currency_rate');
            session()->put('currency_rate', $currency->currency_rate);
        }

        return Session::get('currency_code');
    }
}

if (!function_exists('customCode')) {
    function customCode()
    {
        return Cache::rememberForever('customCode', function () {
            return CustomCode::select('css', 'header_javascript', 'javascript')->first();
        });
    }
}


if (!function_exists('allLanguages')) {
    function allLanguages()
    {
        // cache all languages
        $languages = Cache::rememberForever('languages', function () {
            return Language::all();
        });

        return $languages;
    }
}

if (!function_exists('checkAdminHasPermissionAndThrowException')) {
    function checkAdminHasPermissionAndThrowException($permission)
    {
        if (gettype($permission) == 'string' && !checkAdminHasPermission($permission)) {
            if (request()->ajax()) {
                throw new AccessPermissionDeniedException('Permission Denied!');
            }
            throw new AccessPermissionDeniedException();
        }
        if (gettype($permission) == 'array') {
            $hasPermission = false;
            foreach ($permission as $value) {
                if (checkAdminHasPermission($value)) {
                    $hasPermission = true;
                }
            }

            if (!$hasPermission) {
                if (request()->ajax()) {
                    throw new AccessPermissionDeniedException('Permission Denied!');
                }
                throw new AccessPermissionDeniedException();
            }
        }
    }
}

// all payment methods
if (!function_exists('allPaymentMethods')) {
    function allPaymentMethods($key = null)
    {
        $key = $key ? strtolower($key) : null;

        $paymentService = app(\Modules\BasicPayment\app\Services\PaymentMethodService::class);
        $activeGateways = $paymentService->getActiveGatewaysWithDetails();

        $filteredData = [];

        foreach ($activeGateways as $index => $value) {
            $filteredData[$index] = $value['name'];
        }


        if ($key) {
            return $filteredData[$key];
        }



        return $filteredData;
    }
}

if (!function_exists('allLanguages')) {
    function allLanguages()
    {
        $languages = Cache::rememberForever('languages', function () {
            return Language::all();
        });

        return $languages;
    }
}



if (!function_exists('seoSetting')) {
    function seoSetting()
    {
        try {
            if (!Cache::has('SeoSetting')) {
                $SeoSetting = Cache::rememberForever('SeoSetting', function () {
                    return SeoSetting::all();
                });
            } else {
                $SeoSetting = Cache::get('SeoSetting');
            }
        } catch (\Throwable $th) {
            $SeoSetting = SeoSetting::all();
        }

        return $SeoSetting;
    }
}

// get default language
if (!function_exists('getDefaultLanguage')) {
    function getDefaultLanguage(): string
    {
        // cache default language
        $defaultLanguage = Cache::rememberForever('defaultLanguage', function () {
            return Language::where('is_default', 1)->first()->code;
        });

        return $defaultLanguage;
    }
}
if (!function_exists('currectUrlWithQuery')) {
    function currectUrlWithQuery($code)
    {
        $currentUrlWithQuery = request()->fullUrl();

        // Parse the query string
        $parsedQuery = parse_url($currentUrlWithQuery, PHP_URL_QUERY);

        // Check if the 'code' parameter already exists
        $codeExists = false;
        if ($parsedQuery) {
            parse_str($parsedQuery, $queryArray);
            $codeExists = isset($queryArray['code']);
        }

        if ($codeExists) {
            $updatedUrlWithQuery = preg_replace('/(\?|&)code=[^&]*/', '$1code=' . $code, $currentUrlWithQuery);
        } else {
            $updatedUrlWithQuery = $currentUrlWithQuery . ($parsedQuery ? '&' : '?') . http_build_query(['code' => $code]);
        }
        return $updatedUrlWithQuery;
    }
}

if (!function_exists('remove_comma')) {
    // remove , from number
    function remove_comma($number)
    {
        return str_replace(',', '', $number);
    }
}
if (!function_exists('getSessionLanguage')) {
    function getSessionLanguage(): string
    {
        if (!session()->has('lang')) {
            session()->put('lang', config('app.locale'));
            session()->forget('text_direction');
            session()->put('text_direction', 'ltr');
        }

        $lang = Session::get('lang');

        return $lang;
    }
}

function admin_lang()
{
    return Session::get('admin_lang');
}

// calculate currency

// calculate currency
function currency($price = '')
{

    // currency information will be loaded by Session value

    $currencySetting = allCurrencies()->where('currency_code', getSessionCurrency())->first();


    $currency_icon = $currencySetting->currency_icon;
    $currency_code = $currencySetting->currency_code;
    $currency_rate = $currencySetting->currency_rate;
    $currency_position = $currencySetting->currency_position;
    if ($price) {
        $price = (remove_comma($price)) * $currency_rate;
        $price = number_format($price, 2, '.', ',');

        if ($currency_position == 'before_price') {
            $price = $currency_icon . $price;
        } elseif ($currency_position == 'before_price_with_space') {
            $price = $currency_icon . ' ' . $price;
        } elseif ($currency_position == 'after_price') {
            $price = $price . $currency_icon;
        } elseif ($currency_position == 'after_price_with_space') {
            $price = $price . ' ' . $currency_icon;
        } else {
            $price = $currency_icon . $price;
        }

        return $price;
    } else {

        return $currency_icon . '0.00';
    }
}
// get currency icon
function currency_icon()
{
    $currencySetting = allCurrencies()->where('currency_code', getSessionCurrency())->first();

    return $currencySetting->currency_icon;
}

// remove currency icon using regular expression
function remove_icon($price)
{
    $price = preg_replace('/[^0-9,.]/', '', $price);

    return $price;
}
if (!function_exists('userAuth')) {
    function userAuth()
    {
        return Auth::guard('web')->user();
    }
}

// calculate currency

// custom decode and encode input value
function html_decode($text)
{
    $after_decode = htmlspecialchars_decode($text, ENT_QUOTES);

    return $after_decode;
}

if (!function_exists('checkAdminHasPermission')) {
    function checkAdminHasPermission($permission): bool
    {
        return Auth::guard('admin')->user()->can($permission) ? true : false;
    }
}

if (!function_exists('getSettingStatus')) {
    function getSettingStatus($key)
    {
        if (Cache::has('setting')) {
            $setting = Cache::get('setting');
            if (!is_null($key)) {
                return $setting->$key == 'active' ? true : false;
            }
        } else {
            try {
                return Setting::where('key', 'timezone')->first()?->value == 'active' ? true : false;
            } catch (Exception $e) {
                if (app()->isLocal()) {
                    Log::info($e->getMessage());
                }

                return false;
            }
        }

        return false;
    }
}

// payments gateway

if (!function_exists('getPaymentGateway')) {
    function getPaymentGateway()
    {
        $paymentService = app(\Modules\BasicPayment\app\Services\PaymentMethodService::class);
        $activeGateways = $paymentService->getActiveGatewaysWithDetails();

        $list = array_keys($activeGateways);
        return $list;
    }
}

// subscription plans

if (!function_exists('getSubscriptionPlans')) {
    function getSubscriptionPlans()
    {
        return Cache::rememberForever('subscription_plans', function () {
            return SubscriptionPlan::where('status', 1)->get();
        });
    }
}

// make date
if (!function_exists('make_date')) {
    function make_date($date, $format = 'd M, Y')
    {
        return date($format, strtotime($date));
    }
}


if (!function_exists('getOrderStatus')) {
    function getOrderStatus($status)
    {
        switch ($status) {
            case 1:
                return 'Pending';
            case 2:
                return 'Accepted';
            case 3:
                return 'Progress';
            case 4:
                return 'On the way';
            case 5:
                return 'Delivered';
            case 6:
                return 'Cancelled';
            default:
                return 'Pending';
        }
    }
}

if (!function_exists('statusColor')) {
    function statusColor($status)
    {

        switch ($status) {
            case 1:
                return 'warning text-black fw-normal';
            case 2:
                return 'info';
            case 3:
                return 'info';
            case 4:
                return 'primary';
            case 5:
                return 'success';
            case 6:
                return 'danger';
            case 'success':
                return 'success';
            case 'pending':
                return 'warning text-black fw-normal';
            case 'rejected':
                return 'danger';
            default:
                return 'warning text-black fw-normal';
        }
    }
}


// default avatar

if (!function_exists('avatar')) {
    function avatar($img = null)
    {
        $setting = cache('setting');
        if ($img && file_exists(public_path($img))) {
            return asset($img);
        } else {
            return asset($setting?->default_avatar);
        }
    }
}

if (!function_exists('isShopActive')) {
    function isShopActive()
    {
        $setting = cache('setting');
        $status = isset($setting?->shop_status) && $setting->shop_status == 'active';

        return $status;
    }
}

if (!function_exists('routeList')) {
    function routeList(): object
    {
        $route_list = [
            (object) ['name' => __('Dashboard'), 'route' => 'dashboard', 'permission' => 'dashboard.view'],
            (object) ['name' => __('Members'), 'route' => 'members.index', 'permission' => 'member.list'],
            (object) ['name' => __('Coupon'), 'route' => 'coupon.index', 'permission' => 'coupon.view'],
            (object) ['name' => __('Add Members'), 'route' => 'members.create', 'permission' => 'member.create'],
            (object) ['name' => __('Attendance'), 'route' => 'attendance.create', 'permission' => 'attendance.create'],
            (object) ['name' => __('Attendance Sheet'), 'route' => 'attendance.index', 'permission' => 'attendance.list'],
            (object) ['name' => __('Locker List'), 'route' => 'lockers.index', 'permission' => 'locker.list'],


            (object) ['name' => __('Award'), 'route' => 'award.index', 'permission' => 'award.view'],

            (object) ['name' => __('Activity'), 'route' => 'activity.index', 'permission' => 'activity.view'],

            (object) ['name' => __('City'), 'route' => 'city.index', 'permission' => 'city.view'],
            (object) ['name' => __('State'), 'route' => 'state.index', 'permission' => 'state.view'],

            (object) ['name' => __('Trainer'), 'route' => 'trainer.index', 'permission' => 'trainer.view'],
            (object) ['name' => __('Workout'), 'route' => 'workout.index', 'permission' => 'workout.view'],
            (object) ['name' => __('Specialty'), 'route' => 'specialty.index', 'permission' => 'specialty.view'],
            (object) ['name' => __('Workout Enrolled'), 'route' => 'workout.history', 'permission' => 'workout.view'],
            (object) ['name' => __('Workout Messages'), 'route' => 'workout.messages', 'permission' => 'workout.view'],

            (object) ['name' => __('Service'), 'route' => 'service.index', 'permission' => 'service.view'],
            (object) ['name' => __('Service Messages'), 'route' => 'service.contact', 'permission' => 'service.view'],

            (object) ['name' => __('Section Control'), 'route' => 'section.control', 'permission' => 'website.content.view'],
            (object) ['name' => __('Section Content'), 'route' => 'section.content', 'permission' => 'website.content.view'],

            (object) ['name' => __('Slider'), 'route' => 'slider.list', 'permission' => 'website.content.view'],

            (object) ['name' => __('Call To Action'), 'route' => 'call-to-action.index', 'permission' => 'website.content.view'],

            (object) ['name' => __('Partner'), 'route' => 'partner.index', 'permission' => 'partner.view'],
            (object) ['name' => __('Counter'), 'route' => 'counter.index', 'permission' => 'counter.view'],
            (object) ['name' => __('Home Page') . '1/4', 'route' => 'home-1', 'permission' => 'website.content.view'],
            (object) ['name' => __('Home Page') . '2', 'route' => 'home-2', 'permission' => 'website.content.view'],
            (object) ['name' => __('Home Page') . '3', 'route' => 'home-3', 'permission' => 'website.content.view'],
            (object) ['name' => __('Contact Page'), 'route' => 'contact-page.index', 'permission' => 'website.content.view'],

            (object) ['name' => __('About Page'), 'route' => 'about-page.index', 'permission' => 'website.content.view'],

            (object) ['name' => __('About Section Control'), 'route' => 'about.section.control', 'permission' => 'website.content.view'],

            (object) ['name' => __('Other Pages'), 'route' => 'page-utility.index', 'permission' => 'website.content.view'],




            (object) ['name' => __('Class'), 'route' => 'class.index', 'permission' => 'class.view'],
            (object) ['name' => __('Gallery Image'), 'route' => 'galleryImage.index', 'permission' => 'gallery.image.view'],

            (object) ['name' => __('Gallery Video'), 'route' => 'galleryVideo.index', 'permission' => 'gallery.video.view'],

            (object) ['name' => __('Gallery Group'), 'route' => 'galleryGroup.index', 'permission' => 'gallery.group.view'],




            (object) ['name' => __('Blog Category'), 'route' => 'blog-category.index', 'permission' => 'blog.category.view'],
            (object) ['name' => __('Post List'), 'route' => 'blogs.index', 'permission' => 'blog.view'],
            (object) ['name' => __('Post Comments'), 'route' => 'blog-comment.index', 'permission' => 'blog.comment.view'],
            (object)['name' => __('Subscription Plan'), 'route' => 'subscription-plan.index', 'permission' => 'subscription.view'],
            (object)['name' => __('Subscription History'), 'route' => 'subscription-history', 'permission' => 'subscription.view'],
            (object)['name' => __('Transaction History'), 'route' => 'plan-transaction-history', 'permission' => 'subscription.view'],
            (object)['name' => __('Pending Transaction'), 'route' => 'pending-plan-transaction', 'permission' => 'subscription.view'],
            (object)['name' => __('All Customers'), 'route' => 'all-customers', 'permission' => 'customer.view'],
            (object)['name' => __('Active Customer'), 'route' => 'active-customers', 'permission' => 'customer.view'],
            (object)['name' => __('Non verified'), 'route' => 'non-verified-customers', 'permission' => 'customer.view'],
            (object)['name' => __('Banned Customer'), 'route' => 'banned-customers', 'permission' => 'customer.view'],
            (object)['name' => __('Send bulk mail'), 'route' => 'send-bulk-mail', 'permission' => 'customer.view'],
            (object)['name' => __('Our Team'), 'route' => 'ourteam.index', 'permission' => 'team.management'],
            (object)['name' => __('Menu Builder'), 'route' => 'custom-menu.index', 'permission' => 'menu.view'],
            (object)['name' => __('Page Builder'), 'route' => 'page-builder.index', 'permission' => 'page.view'],
            (object)['name' => __('FAQS'), 'route' => 'faq.index', 'permission' => 'faq.view'],
            (object)['name' => __('Social Links'), 'route' => 'social-link.index', 'permission' => 'social.link.management'],
            (object)['name' => __('Coupon History'), 'route' => 'coupon-history', 'permission' => 'coupon.history'],


            (object)['name' => __('Subscriber List'), 'route' => 'subscriber-list', 'permission' => 'newsletter.view'],
            (object)['name' => __('Send bulk mail'), 'route' => 'send-mail-to-newsletter', 'permission' => 'newsletter.view'],
            (object)['name' => __('Testimonial'), 'route' => 'testimonial.index', 'permission' => 'testimonial.view'],
            (object)['name' => __('Contact Messages'), 'route' => 'contact-messages', 'permission' => 'contact.message.view'],
            (object)['name' => __('General Settings'), 'route' => 'general-setting', 'permission' => 'setting.view'],
            (object)['name' => __('Credential Settings'), 'route' => 'crediential-setting', 'permission' => 'setting.view'],
            (object)['name' => __('Email Configuration'), 'route' => 'email-configuration', 'permission' => 'setting.view'],
            (object)['name' => __('SEO Setup'), 'route' => 'seo-setting', 'permission' => 'setting.view'],

            (object)['name' => __('Clear cache'), 'route' => 'cache-clear', 'permission' => 'setting.view'],
            (object)['name' => __('Database Clear'), 'route' => 'database-clear', 'permission' => 'setting.view'],
            (object)['name' => __('System Update'), 'route' => 'system-update.index', 'permission' => 'setting.view'],
            (object)['name' => __('Manage Addons'), 'route' => 'addons.view', 'permission' => 'setting.view'],
            (object)['name' => __('Manage Language'), 'route' => 'languages.index', 'permission' => 'language.view'],
            (object)['name' => __('Basic Payment'), 'route' => 'basicpayment', 'permission' => 'basic.payment.view'],
            (object)['name' => __('Currency'), 'route' => 'currency.index', 'permission' => 'currency.view'],

            (object)['name' => __('Manage Admin'), 'route' => 'admin.index', 'permission' => 'admin.view'],
            (object)['name' => __('Role & Permissions'), 'route' => 'role.index', 'permission' => 'role.view'],
            (object)['name' => __('Custom JS'), 'route' => 'custom-code', 'permission' => 'setting.view', 'param' => 'js'],
            (object)['name' => __('Custom CSS'), 'route' => 'custom-code', 'permission' => 'setting.view', 'param' => 'css'],
            (object)['name' => __('Site Color'), 'route' => 'general-setting', 'permission' => 'setting.view', 'fragment' => '#site_color_tab'],
        ];

        if (isShopActive()) {
            $route_list[] = (object) ['name' => __('Products'), 'route' => 'product.index', 'permission' => 'product.view'];
            $route_list[] = (object) ['name' => __('Brands'), 'route' => 'brand.index', 'permission' => 'product.brand.view'];
            $route_list[] = (object) ['name' => __('Categories'), 'route' => 'category.index', 'permission' => 'product.category.view'];
            $route_list[] = (object) ['name' => __('Shipping'), 'route' => 'shipping.index', 'permission' => 'shipping.view'];

            $route_list[] = (object) ['name' => __('Attributes'), 'route' => 'attribute.index', 'permission' => 'product.attribute.view'];

            $route_list[] = (object)['name' => __('Tax'), 'route' => 'tax.index', 'permission' => 'tax.view'];

            $route_list[] = (object)['name' => __('Order History'), 'route' => 'orders', 'permission' => 'order.history'];
            $route_list[] = (object)['name' => __('Pending Order'), 'route' => 'pending-orders', 'permission' => 'order.history'];
            $route_list[] = (object)['name' => __('Pending Payment'), 'route' => 'pending-payment', 'permission' => 'order.payment.history'];
            $route_list[] = (object)['name' => __('Rejected Payment'), 'route' => 'rejected-payment', 'permission' => 'order.payment.history'];
        }
        usort($route_list, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return (object) $route_list;
    }
}
