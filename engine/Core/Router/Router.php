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
        return $this->getDispacher($method, $uri)->dispatch($method, $uri);
    }

    public function getDispacher()
    {
        if ($this->dispatcher == null) {
            $this->dispatcher = new UrlDispatcher();

            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}