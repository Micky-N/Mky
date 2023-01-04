<?php

return [
    /*
     * -------------------------------------------------------------
     *  Module Middlewares
     * -------------------------------------------------------------
     *
     * List of middlewares that will be called before each route in the module
     *
     */
    'middlewares' => [
    ],

    /*
     * -------------------------------------------------------------
     *  Route Middlewares
     * -------------------------------------------------------------
     *
     * List of middlewares that will be defined in the routes by alias
     *
     */
    'routeMiddlewares' => [
        'auth' => \App\Middlewares\AuthMiddleware::class
    ],
];