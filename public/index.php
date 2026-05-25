<?php
//i want to test the container class
require_once __DIR__ . '/../app/core/Container.php';
require_once __DIR__ .'/../vendor/autoload.php';

use App\Core\Container;

$container = new Container();

$container->bind(PDO::class, function () {
   return new PDO(
    'mysql:host=' . DB_HOST . 
    ';port=' . DB_PORT .
    ';dbname=' . DB_DATABASE,
    DB_USERNAME,
    DB_PASSWORD
   );
});