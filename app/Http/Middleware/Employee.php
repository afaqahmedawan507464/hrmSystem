<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('employee')->check() && Auth::guard('employee')->user()->roll_status == '4'){    //basic employee
           return $next($request);
        }
        else{
            //redirect to user login page
            return redirect()->route('AdminLoginForm');
        }
    }
}
