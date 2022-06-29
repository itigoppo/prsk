<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('systemColumns', function () {
            $this->timestamp('created_at');
            $this->unsignedBigInteger('created_by')->nullable();
            $this->timestamp('updated_at');
            $this->unsignedBigInteger('updated_by')->nullable();
        });

        Blueprint::macro('systemColumnsWithSoftDelete', function () {
            $this->timestamp('created_at');
            $this->unsignedBigInteger('created_by')->nullable();
            $this->timestamp('updated_at');
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->timestamp('deleted_at')->nullable();
            $this->unsignedBigInteger('deleted_by')->nullable();
        });
    }
}
