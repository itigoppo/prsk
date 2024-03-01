<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class VerifyExpiration
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if ((!$request->exists('token'))) {
      abort(404);
    }

    $token = Str::after($request->token, '-');
    $expiration = Str::before($request->token, '-');

    // ハイフンで区切れないならアウト
    if ($token === $request->token || $expiration === $request->token) {
      abort(404);
    }

    $expirationAt = Carbon::createFromTimestamp($expiration);

    if (
      $expirationAt->isFuture() &&
      password_verify($expiration . '-' . config('custom.storage_key'), $token)
    ) {
      return $next($request);
    }

    abort(410, '有効期限切れです');
  }
}
