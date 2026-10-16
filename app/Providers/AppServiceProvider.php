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
        // Vercel terminates TLS at the edge; the PHP runtime sees http.
        // Force https URLs in production so route()/asset() don't emit http links
        // (http links break history.pushState on the https page).
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
