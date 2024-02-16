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
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
