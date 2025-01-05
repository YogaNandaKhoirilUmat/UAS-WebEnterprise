<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(Auth::user()->role == $userType) {
        return $next($request);
        }

        return response()->json([
            'error' => 'Anda tidak memiliki akses ke halaman ini.',
            'userType' => $userType
        ]);
    }
}
