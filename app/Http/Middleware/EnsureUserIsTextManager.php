<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsTextManager
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
        if (!Auth::user()->isTextManager()) {
            return redirect()->back()->with('error', "Vous n'avez pas le droit d'accéder à la ressource demandée");
        } //dd("kjkjjkj");
        return $next($request);
    }
}
