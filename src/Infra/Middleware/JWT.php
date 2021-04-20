<?php

namespace App\Infra\Middleware;

use PlugRoute\Middleware\PlugRouteMiddleware;
use PlugRoute\Http\Request;

class JWT implements PlugRouteMiddleware
{
    public function handler(Request $request)
    {
        // var_dump($request->headers());
    }
}