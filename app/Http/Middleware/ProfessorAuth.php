<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfessorAuth
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
            if (auth()->user()->role == 'professor')
            return $next($request);
        }

        return redirect()->to('/');
    }
}
