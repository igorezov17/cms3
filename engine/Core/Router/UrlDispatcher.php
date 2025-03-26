<?php

namespace Engine\Core\Router;

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

    public $pattern = [

    ];

    private function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    public function dispatch($method, $uri)
    {
        $routes = $this->routes($method);

        if (array_key_exists($uri, $routes)) {

        }
    }
}