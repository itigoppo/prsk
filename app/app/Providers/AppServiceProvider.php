<?php

namespace App\Providers;

use App\View\Components\AdminLayout;
use App\View\Components\MaterialSymbol;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    // エラー出てるけど取れてるから気にしない
    if ($this->app->isLocal()) {
      $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Blade::component('admin-layout', AdminLayout::class);
    Blade::component('matelial-symbol', MaterialSymbol::class);
  }
}
