<?php

use App\Http\Middleware\CsrfTokenWithExclusion;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [__DIR__.'/../routes/web.php', __DIR__.'/../routes/bitrix.php'],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(replace: [ValidateCsrfToken::class => CsrfTokenWithExclusion::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
