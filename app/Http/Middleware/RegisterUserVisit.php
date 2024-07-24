<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterUserVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()) {
            return $next($request);
        }

        if (!$request->session()->has('has_visited')) {

            Visit::create([
                'ip_address' => $request->ip(),
            ]);

            session(['has_visited' => true]);
        }

        return $next($request);
    }
}
