<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // echo "you are in logged administrator ";
            // exit;
            if (auth()->user()->role->name == 'Manager') {
                return $next($request);
            }
            if (auth()->user()->role->name == 'Employee') {
                return redirect('employee');

            }

        } else {
            return redirect('login');
        }

    }
}
