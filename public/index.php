<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';


use App\Core\Router;
use App\Core\Container;
use PDO;

$container = new Container();
$container->bind(PDO::class, function() {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_DATABASE;
    return new PDO($dsn, DB_USERNAME, DB_PASSWORD);
});

$router = $container->get(Router::class);

require_once __DIR__ . '/../routes/web.php';

$dispatchResult = $router->dispatch();

if (!is_array($dispatchResult) || count($dispatchResult) !== 2) {
    return;
}

[$callback, $params] = $dispatchResult;
//var_dump($callback); // Debugging output to see the callback
//var_dump($params); // Debugging output to see the params

if (!is_string($callback) || strpos($callback, '@') === false) {
    http_response_code(500);
    echo 'Invalid route callback.';
    return;
}

list($controllerClass, $method) = explode('@', $callback, 2);
if (!class_exists($controllerClass)) {
    $controllerClass = 'App\\Controllers\\' . ltrim($controllerClass, '\\');
}

if (!class_exists($controllerClass)) {
    http_response_code(500);
    echo "Controller {$controllerClass} not found.";
    return;
}
//var_dump($controllerClass); // Debugging output to see the controller class

$controller = $container->get($controllerClass);
/*if(!is_object($controller)) {
    echo "Failed to instantiate controller {$controllerClass}.";
} else {
    //var_dump($controller); // Debugging output to see the controller object
    echo "Controller {$controllerClass} instantiated successfully.";
}

if (!method_exists($controller, $method)) {
    http_response_code(500);
    echo "Method {$method} not found on controller {$controllerClass}.";
    return;
}*/

call_user_func_array([$controller, $method], $params);


//will need to understand this better