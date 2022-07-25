<?php

namespace App\Providers;

use App\Interfaces\ChangeLogsRepositoryInterface;
use App\Interfaces\DancersRepositoryInterface;
use App\Interfaces\IconsRepositoryInterface;
use App\Interfaces\InteractionsRepositoryInterface;
use App\Interfaces\MembersRepositoryInterface;
use App\Interfaces\TunesRepositoryInterface;
use App\Interfaces\UnitsRepositoryInterface;
use App\Interfaces\SingersRepositoryInterface;
use App\Repositories\ChangeLogsRepository;
use App\Repositories\DancersRepository;
use App\Repositories\IconsRepository;
use App\Repositories\InteractionsRepository;
use App\Repositories\MembersRepository;
use App\Repositories\TunesRepository;
use App\Repositories\UnitsRepository;
use App\Repositories\SingersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UnitsRepositoryInterface::class,
            UnitsRepository::class
        );
        $this->app->bind(
            MembersRepositoryInterface::class,
            MembersRepository::class
        );
        $this->app->bind(
            IconsRepositoryInterface::class,
            IconsRepository::class
        );
        $this->app->bind(
            InteractionsRepositoryInterface::class,
            InteractionsRepository::class
        );
        $this->app->bind(
            ChangeLogsRepositoryInterface::class,
            ChangeLogsRepository::class
        );
        $this->app->bind(
            TunesRepositoryInterface::class,
            TunesRepository::class
        );
        $this->app->bind(
            SingersRepositoryInterface::class,
            SingersRepository::class
        );
        $this->app->bind(
            DancersRepositoryInterface::class,
            DancersRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
