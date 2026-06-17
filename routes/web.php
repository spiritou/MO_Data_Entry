<?php

$router->get('/', 'App\\Controllers\\AuthController@index');

$router->post('/login', 'App\\Controllers\\AuthController@login');

