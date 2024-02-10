<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware(['api', 'auth:sanctum'])
                ->prefix('api')
                ->name('api')
                ->group(base_path('routes/api.php'));

            Route::middleware(['web', 'auth:sanctum', 'verified'])
            ->group(base_path('routes/web.php'));

            // 메일확인된 인증된 사용자
            //Route::middleware(['web', 'auth', 'verified'])
            //->group(base_path('routes/web.php'));        
            
            Route::middleware('web')
                ->group(base_path('routes/auth.php'));

            Route::middleware(['web', 'auth', 'password.confirm'])
                ->prefix('/dashboard')
                ->name('dashboard.')
                ->group(base_path('routes/dashboard.php'));            

        });
    }
}
