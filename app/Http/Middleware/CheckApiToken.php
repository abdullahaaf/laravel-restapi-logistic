<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class CheckApiToken
{
    public function handle($request, Closure $next)
    {
        $apiToken = env('API_TOKEN');
        $bearerToken = $request->bearerToken();

        if (!$bearerToken || $bearerToken !== $apiToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
