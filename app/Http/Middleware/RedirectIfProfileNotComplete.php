<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfProfileNotComplete
{

    /**
     * Handle an incoming request.
     * Check if user has completed their profil information before they continue with their request
     * In case profil not complete, they would be redirected to the profil page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //TODO apply withoutmiddleware on the route file
        if(!Auth::user()->isComplete())
        {
            return redirect()
                    ->route('user.profile')
                    ->with('error', 'Please complete your profil first !'); 
        }
        return $next($request);
    }
}
