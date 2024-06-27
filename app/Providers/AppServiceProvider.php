<?php

namespace App\Providers;


use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\RateLimiter;
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
      
        if (env('APP_ENV') == 'production') {
            $url->forceScheme('https');

        RateLimiter::for('login', function (Request $request) {
            $maxAttempts = (int) env('LOGIN_MAX_ATTEMPTS', 3);
            $decayMinutes = (int) env('LOGIN_DECAY_MINUTES', 1);

            return Limit::perMinutes($decayMinutes, $maxAttempts)->by($request->ip());
        });
    }

}
