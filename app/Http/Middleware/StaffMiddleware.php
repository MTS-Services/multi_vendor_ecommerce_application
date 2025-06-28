<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $staff = Auth::guard('staff');
        if (!$staff->check()) {
            return redirect()->route('staff.login');
        }
        if ($staff->user() && $staff->user()->email_verified_at === null) {
            if (!$request->routeIs('staff.verification.notice')) {
                return redirect()->route('staff.verification.notice');
            }
        }
        return $next($request);
    }
}
