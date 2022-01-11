<?php

use Core\App;
use GuzzleHttp\Psr7\ServerRequest;


require dirname(__DIR__).'/vendor/autoload.php';

defined('ROOT') or define('ROOT', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']);

App::setModule([
    \App\Product\ProductModule::class
]);
if(php_sapi_name() !== 'cli'){
    App::run(ServerRequest::fromGlobals());
}