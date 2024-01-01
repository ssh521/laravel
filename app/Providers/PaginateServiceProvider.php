<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * @mixin \Illuminate\Support\Collection
 */
class PaginateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor/pagination/default');
        Paginator::defaultSimpleView('vendor/pagination/simple-default');
    }
}
