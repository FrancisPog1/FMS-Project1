<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

// I added this code for the role management
// Added on 06/19/23 1:55 PM
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check())
            {
                //Edited 06/19/23 01:02 PM
                if (Auth::user()->foreign_role_id == '1') {
                    return redirect(RouteServiceProvider::AcadHead_HOME);
                }

                elseif (Auth::user()->foreign_role_id == '2') {
                    return redirect(RouteServiceProvider::Faculty_HOME);

                }

                elseif (Auth::user()->foreign_role_id == '3') {
                    return redirect(RouteServiceProvider::Staff_HOME);

                }

                elseif (Auth::user()->foreign_role_id == '4') {
                    return redirect(RouteServiceProvider::Director_HOME);
                }

            }
        }

        return $next($request);
    }
}
