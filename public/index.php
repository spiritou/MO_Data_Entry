<?php
//i want to test the container class
require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/../config/config.php';

use App\Core\Container;
use App\Core\Router;
use PDO;

$container = new Container();
$router = new Router();
$router->dispatch(); //this will run the router and check the current path and method
$container->bind(PDO::class, function () {
   return new PDO(
    'mysql:host=' . DB_HOST . 
    ';port=' . DB_PORT .
    ';dbname=' . DB_DATABASE,
    DB_USERNAME,
    DB_PASSWORD
   );
});

try {
    $pdo = $container->get(PDO::class);
    echo "PDO instance created successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


