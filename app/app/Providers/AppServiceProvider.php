<?php

namespace App\Providers;

use App\Services\CardReportsService;
use App\Services\CardsService;
use App\Services\ChangeLogsService;
use App\Services\EventReportsService;
use App\Services\EventsService;
use App\Services\IconsService;
use App\Services\InteractionsService;
use App\Services\MembersService;
use App\Services\TunesService;
use App\Services\UnitsService;
use App\Services\VirtualLivesService;
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
        $this->app->bind('InteractionsService', InteractionsService::class);
        $this->app->bind('ChangeLogsService', ChangeLogsService::class);
        $this->app->bind('TunesService', TunesService::class);
        $this->app->bind('CardsService', CardsService::class);
        $this->app->bind('EventsService', EventsService::class);
        $this->app->bind('VirtualLivesService', VirtualLivesService::class);
        $this->app->bind('EventReportsService', EventReportsService::class);
        $this->app->bind('CardReportsService', CardReportsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Paginator::defaultView('pagination::customize-bootstrap-5');
    }
}
