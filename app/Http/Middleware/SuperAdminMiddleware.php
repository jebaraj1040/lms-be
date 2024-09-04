<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            if (auth()->user()->role->name == 'superadmin') {
                return $next($request);
            }
            if (auth()->user()->role->name == 'student') {
                return $next($request);
            }
            if (auth()->user()->role->name == 'admin') {
                return redirect('admin');
            }

            if (auth()->user()->role->name == 'teacher') {
                return redirect('teacher');
            }

        } else {
            return redirect('login');
        }
    }
}
