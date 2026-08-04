<?php

/* @var \App\Core\Router $router */

$router->get('/', 'App\\Controllers\\AuthController@index');

$router->post('/api/login', 'App\\Controllers\\AuthController@login');

$router->get('/data-entry', 'App\\Controllers\\EntryController@index');

$router->get('/dashboard', 'App\\Controllers\\DashboardController@index');



