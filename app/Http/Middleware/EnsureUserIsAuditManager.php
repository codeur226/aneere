<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuditManager
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
        if (!Auth::user()->isAuditManager()) {
            Auth::logout();
            return redirect()->route('login')->with('error', "Vous n'avez pas le droit d'accéder à la ressource demandée");
        }
        return $next($request);
    }
}
