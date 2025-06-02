<?php

use App\Http\Middleware\ForceRequestHeaderAcceptJson;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('api')->get('/health-check', function () {
                return response()->json([], Response::HTTP_OK);
            });


            Route::middleware('api')
                ->prefix('v1')
                ->group(__DIR__.'/../routes/api/v1.php');
        },
        commands: __DIR__.'/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api()->prepend(ForceRequestHeaderAcceptJson::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
