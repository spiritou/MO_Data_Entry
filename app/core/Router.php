<?php

//this will be the main router class that will handle all the routing logic

namespace App\Core;

class Router
{
    private $routes = [];
    
    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function run()
    {
        //here we will get the current path and method and match it with the defined routes
    }
}