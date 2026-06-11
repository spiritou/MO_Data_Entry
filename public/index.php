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
if ($router instanceof Router) {
    echo "Router instance created successfully!";
} else {
    echo "Failed to create Router instance.";
}