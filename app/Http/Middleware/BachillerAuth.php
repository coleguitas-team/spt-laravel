<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BachillerAuth
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
        if(auth()->check()) {
            if (auth()->user()->role == 'bachelor')
            return $next($request);
        }

        return redirect()->to('/');
    }
}
