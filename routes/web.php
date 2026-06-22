<?php

/* @var \App\Core\Router $router */

$router->get('/', 'App\\Controllers\\AuthController@index');

$router->post('/api/login', 'App\\Controllers\\AuthController@login');

