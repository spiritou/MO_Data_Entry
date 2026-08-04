<?php

//this will be the main router class that will handle all the routing logic

namespace App\Core;

class Router
{
    private array $routes = [];
    
    //this will register a GET route
    public function get(string $path, string $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    //this will register a POST route
    public function post(string $path, string $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch()
    {
        //here we will get the current path and method and match it with the defined routes

        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $path = preg_replace('#^/MO_app/public#i', '', $path);
        $path = preg_replace('#^/MO_APP/public#i', '', $path);

        if ($path === '') {
            $path = '/';
        }
        
        if(!isset($this->routes[$method])) {
            //if the route is not defined, we will return a 404 error
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        foreach ($this->routes[$method] as $route=>$callback) {
            $pattern = preg_replace('#\{([^\}]+)\}#', '([^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove the full match

                return [$callback, $matches];
        }
    }

        //if no route is matched, we will return a 404 error
        http_response_code(404);
        echo "404 Not Found 1";
        var_dump($path);
    }
}