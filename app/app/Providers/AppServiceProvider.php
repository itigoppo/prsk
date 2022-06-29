<?php

namespace App\Providers;

use App\Services\IconsService;
use App\Services\MembersService;
use App\Services\Route\UrlGenerator;
use App\Services\UnitsService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind('UnitsService', UnitsService::class);
        $this->app->bind('MembersService', MembersService::class);
        $this->app->bind('IconsService', IconsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $url = $this->app['url'];
        $this->app->singleton('url', function () use ($url) {
            return new UrlGenerator($url);
        });
    }
}
