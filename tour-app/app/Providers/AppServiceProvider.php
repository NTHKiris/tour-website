<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS in production if behind a reverse proxy
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
            // Also trust proxies for X-Forwarded headers
            $this->app['request']->setTrustedProxies(['*'], \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL);
        }
    }
}
