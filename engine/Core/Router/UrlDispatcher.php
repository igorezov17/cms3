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

    public function register($method, $pattern, $controller):void
    {
        $pattern = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    private function convertPattern($pattern)
    {
        if (strpos($pattern, '(') === false) {
            return $pattern;
        }

        return  preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacerPattern'], $pattern);
    }

    private function replacerPattern($matches)
    {
        // echo "<pre>";
        // print_r($matches);
        // echo "</pre>";

        return '(?<'.$matches[1]. '>' . strtr($matches[2], $this->patterns) . ')';
    }

    private function processParam($parameters)
    {
        foreach($parameters as $key => $value) {
            if (is_int($key)) {
                unset($parameters[$key]);
            }
        }

        return $parameters;
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

        return $this->doDispached($method, $uri);
    }

    public function doDispached($method, $uri)
    {
        foreach($this->routes(strtoupper($method)) as $route => $controller) {
            $pattern = '#^' . $route . '$#s';

            if (preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
    }
}