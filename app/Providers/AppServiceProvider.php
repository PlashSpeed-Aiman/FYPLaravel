<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('App\Services\DocumentService', function ($app) {
            return new \App\Services\DocumentService();
        });

        $this->app->bind('App\Services\PaymentService', function ($app) {
            return new \App\Services\PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
