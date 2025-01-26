<?php

use App\Http\Middleware\EnsureUserDoesntHaveRole;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['role' => \Spatie\Permission\Middleware\RoleMiddleware::class]);
        $middleware->appendToGroup('assigned-users', [EnsureUserHasRole::class]);
        $middleware->appendToGroup('no-role', [EnsureUserDoesntHaveRole::class]);
        $middleware->group('user-access', ['auth', 'verified', 'assigned-users']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
