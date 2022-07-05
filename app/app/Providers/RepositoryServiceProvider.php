<?php

namespace App\Providers;

use App\Interfaces\IconsRepositoryInterface;
use App\Interfaces\InteractionsRepositoryInterface;
use App\Interfaces\MembersRepositoryInterface;
use App\Interfaces\UnitsRepositoryInterface;
use App\Repositories\IconsRepository;
use App\Repositories\InteractionsRepository;
use App\Repositories\MembersRepository;
use App\Repositories\UnitsRepository;
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
