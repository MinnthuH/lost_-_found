<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user instanceof FilamentUser && $user instanceof MustVerifyEmail) {
            if (! $user->canAccessFilament() && ! $user->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }
        }

        return $next($request);
    }

}
