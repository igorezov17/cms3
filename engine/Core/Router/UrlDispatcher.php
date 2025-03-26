<?php

namespace Engine\Core\Router;

use Engine\Core\Router\DispatchedRoute;

class UrlDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    public $routes = [
        'GET'  => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',       
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function addPatterns($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    private function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        } 

        return false;
    }
}