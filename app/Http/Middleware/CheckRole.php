<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {


    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // التحقق من نوع المستخدم وتخزين معرّف الموظف في الجلسة إذا كان المستخدم هو موظف
        if (auth()->user()->role === 'employee') {
            session(['employee_id' => auth()->user()->id]);
            return redirect()->route('employee-dashboard');
        }

        return redirect()->route('admin.dashboard'); 
    }
    // ...

        return $next($request);
   
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
    
}
