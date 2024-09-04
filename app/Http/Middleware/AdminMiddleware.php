<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
            if (auth()->user()->role->name == 'admin') {
                return $next($request);

            }
            if (auth()->user()->role->name == 'student') {
                return redirect('student');

            }
            if (auth()->user()->role->name == 'superadmin') {
                return redirect('superadmin');
            }
            if (auth()->user()->role->name == 'teacher') {
                return redirect('teacher');
            }

        } else {
            return redirect('login');
        }

    }
}
