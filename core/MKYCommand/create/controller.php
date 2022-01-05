<?php

require_once 'vendor/autoload.php';
use Core\MKYCommand\MickyCLI;

if (php_sapi_name() === "cli") {
    $cli = getopt('', MickyCLI::cliLongOptions());
    $option = $cli['create'];
    $path = isset($cli['path']) ? ucfirst($cli['path']) : null;
    $controllerName = ucfirst($cli['name']);
    $crud = isset($cli['crud']) ? file_get_contents(MickyCLI::BASE_MKY."/templates/controller/crud.".MickyCLI::EXTENSION) : null;
    $model = isset($cli['model']) ? $cli['model'] : null;
    if (!strpos($controllerName, 'Controller')) {
        throw new Exception("Le controller $controllerName doit avoir un suffix Controller.");
    }
    $template = file_get_contents(MickyCLI::BASE_MKY."/templates/$option.".MickyCLI::EXTENSION);
    $template = str_replace('!name', $controllerName, $template);
    $template = str_replace('!path', $path ? "\\".ucfirst($path) : '', $template);
    $template = str_replace('!model', $model ? "use App\\Models\\".ucfirst($model).";" : '', $template);
    $template = str_replace('!crud', $crud ? "\n".$crud : '', $template);
    if (file_exists("app/Http/Controllers/$path$controllerName.php")) {
        throw new Exception("Le controller $controllerName existe déjà.");
    }
    if (!is_dir("app/Http/Controllers".($path ? "/".$path : ''))) {
        mkdir("app/Http/Controllers".($path ? "/".$path : ''), 0777, true); // true for recursive create
    }
    $controller = fopen("app/Http/Controllers/".($path ? "$path/" : '')."$controllerName.php", "w") or die("Le controller $controllerName n'existe pas.");
    $start = "<"."?"."php\n\n";
    fwrite($controller, $start.$template);
    print("Le controller $controllerName a été créé.");
}