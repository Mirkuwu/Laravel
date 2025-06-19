<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $scope)
    {
    $user = $request->user();

    if (! $user) {
        return response()->json(['message' => 'No autorizado'], 403);
    }

    foreach ($scopes as $scope) {
        if ($user->tokenCan($scope)) {
            return $next($request);
        }
    }

    return response()->json(['message' => 'No autorizado'], 403);
    }
}
