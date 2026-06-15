<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';


use App\Core\Router;
use App\Core\Container;
use PDO;

$container = new Container();
$router = $container->get(Router::class);

require_once __DIR__ . '/../routes/web.php';

//check if the router object is created successfully
/*if ($router instanceof Router) {
    echo "Router instance created successfully!";
} else {
    echo "Failed to create Router instance.";
}*/

$dispatchResult = $router->dispatch();
//var_dump($dispatchResult); // Debugging output to see the dispatch result

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
//var_dump($controllerClass); // Debugging output to see the controller class
//var_dump($method); // Debugging output to see the method name
if (!class_exists($controllerClass)) {
    $controllerClass = 'App\\Controllers\\' . ltrim($controllerClass, '\\');
    //var_dump($controllerClass); // Debugging output to see the controller class
}

if (!class_exists($controllerClass)) {
    http_response_code(500);
    echo "Controller {$controllerClass} not found.";
    return;
}
//var_dump($controllerClass); // Debugging output to see the controller class

$controller = $container->get($controllerClass);
if(!is_object($controller)) {
    echo "Failed to instantiate controller {$controllerClass}.";
} else {
    //var_dump($controller); // Debugging output to see the controller object
}

if (!method_exists($controller, $method)) {
    http_response_code(500);
    echo "Method {$method} not found on controller {$controllerClass}.";
    return;
}

//call_user_func_array([$controller, $method], $params);


//will need to understand this better