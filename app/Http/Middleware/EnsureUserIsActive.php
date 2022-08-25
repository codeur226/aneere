<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->isActive()) {
            Auth::logout();
            return redirect()->route('login')->with('error', "Votre compte a été désactivé ! Veuillez contacter l'administrateur de la plateforme pour en savoir plus.");
        }
        return $next($request);
    }
}
