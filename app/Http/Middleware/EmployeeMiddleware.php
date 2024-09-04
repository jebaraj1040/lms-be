<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->role->name == 'Employee') {
                return $next($request);
            }
            if (auth()->user()->role->name == 'Manager') {
                return redirect('manager');

            }
        } else {
            return $next($request);
        }

    }
}
