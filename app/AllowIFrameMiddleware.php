<?php

namespace App;

use Closure;
use Illuminate\Http\Request;

class AllowIFrameMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Frame-Options', 'ALLOW FROM https://b24-hre691.bitrix24.eu/');
        return $response;

    }
}
