<?php

namespace App\Providers;

use App\View\NavigationComposer;
use App\View\AdminNavigationComposer;
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
        view()->composer('layouts.app',NavigationComposer::class);
        view()->composer('backend.layout',AdminNavigationComposer::class);
    }
}
