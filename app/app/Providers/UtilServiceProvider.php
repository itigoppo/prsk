<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UtilServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
    $this->app->singleton('form', 'App\Facades\Utilities\FormUtil');
    $this->app->singleton('storage', 'App\Facades\Utilities\StorageUtil');
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
