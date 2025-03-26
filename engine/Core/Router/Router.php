<?php

namespace Engine\Core\Router;

use Engine\Core\Router\UrlDispatch;

class Router
{

    private $host;
    private $routes = [];
    private $dispatcher;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'pattern'    => $pattern,
            'controller' => $controller,
            'method'     => $method
        ];
    }


    public function dispatch($method, $uri)
    {

    }

    public function getDispacher($method, $uri)
    {
        if ($this->dispatcher == null) {
            $dispatch = new UrlDispatcher();
            $dispatch->dispatch($method, $uri);
        }

        return $this->dispatcher;
    }
}