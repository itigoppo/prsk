<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::hashClientSecrets();
        if (!$this->app->routesAreCached()) {
            Passport::routes();
            Passport::tokensExpireIn(now()->addHours(1));
            Passport::refreshTokensExpireIn(now()->addDays(1));
            Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        }

        Gate::define('isAdmin', function (User $user) {
            return $user->role->value === Role::ADMINISTRATOR;
        });
    }
}
