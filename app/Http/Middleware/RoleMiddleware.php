<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == 'Admin') {
            return redirect('/user-suma')->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);

        /** Lama */
        // if ($role == 'admin' && auth()->user()->role != 1) {
        //     abort(code: 403);
        // }

        // if ($role == 'superAdmin' && auth()->user()->role != 2) {
        //     abort(code: 403);
        // }
        // return $next($request);
    }
}
