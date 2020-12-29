<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $langs = array_keys(config('langs'));
        $default = $langs[0];
        $locale = request()->segment(1);
        if (in_array($locale, $langs)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale($default);
        }

        $settings = Setting::get();

        View::share('settings', $settings);
    }
}
