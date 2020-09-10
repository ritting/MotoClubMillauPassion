<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class verifie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::User()->admin)
        {
            return $next($request);
        }
        else
        {
            echo 'Vous n\'êtes pas encore menbre du club';
            return redirect()->to('/');
        }
    }
}
