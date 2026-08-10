<?php

/* @var \App\Core\Router $router */

$router->get('/', 'App\\Controllers\\AuthController@index');

$router->post('/api/login', 'App\\Controllers\\AuthController@login');

$router->get('/data-entry', 'App\\Controllers\\EntryController@index', ['App\\Middleware\\AuthMiddleware']);

$router->get('/dashboard', 'App\\Controllers\\DashboardController@index', ['App\\Middleware\\AuthMiddleware']);

$router->get('/user-management', 'App\\Controllers\\UserController@index', ['App\\Middleware\\AuthMiddleware']);

$router->get('/logout', 'App\\Controllers\\AuthController@logout', ['App\\Middleware\\AuthMiddleware']);



