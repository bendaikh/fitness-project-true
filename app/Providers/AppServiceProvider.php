<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\GlobalSetting\app\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (request('theme')) {
                if (cache()->has('selected_theme') && cache('selected_theme') != request('theme')) {
                    cache()->forget('selected_theme');
                }
                cache()->remember('selected_theme', 1800, function () {
                    return request('theme');
                });
            }

            $setting = Cache::rememberForever('setting', function () {
                $setting_info = Setting::get();
                $setting = [];
                foreach ($setting_info as $setting_item) {
                    $setting[$setting_item->key] = $setting_item->value;
                }

                if (cache()->has('selected_theme')) {
                    $setting['selected_theme'] = cache('selected_theme');
                }
                $setting = (object) $setting;

                return $setting;
            });
            config(['broadcasting.connections.pusher.key' => $setting->pusher_app_key]);
            config(['broadcasting.connections.pusher.secret' => $setting->pusher_app_secret]);
            config(['broadcasting.connections.pusher.app_id' => $setting->pusher_app_id]);
            config(['broadcasting.connections.pusher.options.cluster' => $setting->pusher_app_cluster]);
            config(['broadcasting.connections.pusher.options.host' => 'api-' . $setting->pusher_app_cluster . '.pusher.com']);

            if (cache()->has('selected_theme')) {
                if (array_search(cache()->get('selected_theme'), [1, 2, 3, 4])) {
                    define('THEME', cache('selected_theme'));
                } else {
                    define('THEME', isset($setting->selected_theme) ? $setting->selected_theme : $setting->home_theme);
                }
            } else {
                define('THEME', isset($setting->selected_theme) ? $setting->selected_theme : $setting->home_theme);
            }
        } catch (\Throwable $th) {
            $setting = null;
        }

        View::composer('*', function ($view) {

            $setting = Cache::get('setting');

            $view->with('setting', $setting);
        });


        /**
         * Register custom blade directives
         * this can be used for permission or permissions check
         * this check will be perform on admin guard
         */
        $this->registerBladeDirectives();
        Paginator::useBootstrapFive();
    }

    protected function registerBladeDirectives()
    {
        Blade::directive('adminCan', function ($permission) {
            return "<?php if(auth()->guard('admin')->user()->can({$permission})): ?>";
        });

        Blade::directive('endadminCan', function () {
            return '<?php endif; ?>';
        });
    }
}
