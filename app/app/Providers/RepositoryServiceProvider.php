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
  }
}
