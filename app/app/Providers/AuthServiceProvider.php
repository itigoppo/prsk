<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    //
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    //
    Gate::define('isAdmin', function (User $user) {
      return $user->role->value === RoleEnum::Administrator->value;
    });

    Passport::hashClientSecrets();
    Passport::tokensExpireIn(now()->addHours(1));
    Passport::refreshTokensExpireIn(now()->addDays(1));
    Passport::personalAccessTokensExpireIn(now()->addMonths(6));
  }
}
