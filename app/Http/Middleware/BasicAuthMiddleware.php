<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class BasicAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = config('auth.basic.user');
        $password = config('auth.basic.password');

        if (
            $request->getUser() !== $user ||
            $request->getPassword() !== $password
        ) {
            throw new UnauthorizedHttpException('Basic');
        }

        return $next($request);
    }
}
