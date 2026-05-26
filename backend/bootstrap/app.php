<?php

use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\ApiAuthenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Replace default Authenticate with our API-safe version
        $middleware->replace(Authenticate::class, ApiAuthenticate::class);

        // Also rebind the 'auth' alias to point to ApiAuthenticate
        $middleware->alias([
            'auth' => ApiAuthenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
