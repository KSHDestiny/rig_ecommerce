<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! empty(Auth::check())) {
            if (Auth::user()->role == 'admin') {
                return $next($request);
            } else {
                return redirect()->route('frontend.home');
            }
        } else {
            /*
            Auth::logout();

            return redirect('');
            */
            return redirect(url('admin-login'));
        }
    }
}
