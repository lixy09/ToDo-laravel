<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url): void
    {
        Paginator::defaultView('common.pagination');
        //
        if (env('APP_ENV') == 'production') {
            $url->forceScheme('https');
        }
    }

}
