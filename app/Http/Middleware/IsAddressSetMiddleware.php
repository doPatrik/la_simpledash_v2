<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAddressSetMiddleware
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
        if (auth()->check() && auth()->user()->addresses->isEmpty()
            && !$request->is('set-address') && !$request->zip_code)
        {
            return redirect()->route('address_set.create');
        }

        if (auth()->check() && !auth()->user()->addresses->isEmpty() && $request->is('set-address')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
