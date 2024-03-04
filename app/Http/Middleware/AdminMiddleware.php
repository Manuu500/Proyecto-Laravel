<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->tipo === 'admin') {
            return $next($request);
        }

        return new Response('Forbidden', 403);
    }
}
