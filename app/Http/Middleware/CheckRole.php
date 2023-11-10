<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rolWeb): Response
    {
        if (!$request->user() || !$request->user()->hasRole($rolWeb)) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}
