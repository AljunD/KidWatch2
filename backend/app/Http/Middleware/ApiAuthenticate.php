<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ApiAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        // For API-only apps, return null so Laravel sends a 401 JSON
        if (! $request->expectsJson()) {
            return null;
        }

        return null;
    }
}
