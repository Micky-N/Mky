<?php

require_once 'vendor/autoload.php';
use Core\MKYCommand\MickyCLI;

if (php_sapi_name() === "cli") {
    $cli = getopt('', MickyCLI::cliLongOptions());
    $request = isset($cli['request']) ? $cli['request'] : null;
    $controller = isset($cli['controller']) ? $cli['controller'] : null;
    $routes = Core\Facades\Route::toArray();
    if($request){
        $routes = array_filter($routes, function($route)use($request){
            return $route[0] == strtoupper($request);
        });
    }
    if($controller){
        $routes = array_filter($routes, function($route)use($controller){
            return $route[2] == $controller;
        });
    }
    $array = [['request', 'path', 'controller', 'method', 'name', 'middleware']];
    array_push($array, ...$routes);
    echo MickyCLI::table($array);
}