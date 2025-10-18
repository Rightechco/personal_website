<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Auth;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $admin = null, $writer = null): Response
    {
        $roles = Auth::check() ? [Auth::user()->role] : [];
        if (in_array($admin, $roles)) {
            return $next($request);
        } else if (in_array($writer, $roles)) {
            return $next($request);
        }
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
