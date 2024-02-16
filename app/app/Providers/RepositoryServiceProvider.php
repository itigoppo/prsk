<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    // Unit
    $this->app->bind(
      \App\Repositories\Interfaces\UnitRepositoryInterface::class,
      \App\Repositories\UnitRepository::class
    );
    // Icon
    $this->app->bind(
      \App\Repositories\Interfaces\IconRepositoryInterface::class,
      \App\Repositories\IconRepository::class
    );
    // Member
    $this->app->bind(
      \App\Repositories\Interfaces\MemberRepositoryInterface::class,
      \App\Repositories\MemberRepository::class
    );
  }
}
