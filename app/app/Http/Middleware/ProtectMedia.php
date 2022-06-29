<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProtectMedia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $expiration = $request->expiration;
        $expirationAt = Carbon::createFromTimestamp($request->expiration);
        $token = $request->token;

        if($expirationAt->isFuture() && decrypt($token) === $expiration) {
            return $next($request);
        }

        abort(410, '有効期限切れです');
    }
}
