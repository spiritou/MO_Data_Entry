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

        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        //$path = str_replace('/app/public', '', $path); //remove the /app/public part from the path
        
        var_dump($path);
        //check if the route exists
    }
}