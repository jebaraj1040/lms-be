<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->check());
        if (auth()->check()) {
            if (auth()->user()->role->name == 'teacher') {
                return $next($request);
            }
            if (auth()->user()->role->name == 'admin') {
                return redirect('admin');
            }
            if (auth()->user()->role->name == 'superadmin') {
                return redirect('superadmin');
            }
            if (auth()->user()->role->name == 'student') {
                return redirect('student');
            }

        } else {
            return redirect('login');
        }

    }
}
