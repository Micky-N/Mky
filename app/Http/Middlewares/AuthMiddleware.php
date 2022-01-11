<?php

namespace App\Http\Middlewares;


use Core\Facades\Route;
use Core\Interfaces\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware implements MiddlewareInterface
{

    /**
     * @param callable $next
     * @param ServerRequestInterface $request
     * @return callable|void
     */
    public function process(callable $next, ServerRequestInterface $request)
    {
        if(!isLogin()){
            Route::redirectName('auth.signin');
        }
        return $next($request);
    }
}