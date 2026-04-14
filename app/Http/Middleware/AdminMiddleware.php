<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Si no està autenticat → 401
        if (!$request->user()) {
            return response()->json(['error' => 'No autenticat'], 401);
        }

        // Si no és admin → 403
        if ($request->user()->role_id !== 1) {
            return response()->json(['error' => 'Accés denegat'], 403);
        }

        return $next($request);
    }
}
