<?php

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

class Cms {

    private $di;

    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run():void
    {

        try {

            require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Routes.php';

            $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getUrl());
    
            if ($routeDispatch == null) {


                $routeDispatch = new DispatchedRoute('ErrorController:page404');
            }

    
            list($class, $action) = explode(':', $routeDispatch->getController(), 2);

    
            $controller = '\\' . ENV . '\\Controller\\' . $class; 
            $parameters = $routeDispatch->getParameters() ? $routeDispatch->getParameters() : [];
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch(\Exception $e) {
            print_r($e->getMessage());
            exit;
        }

      
    }
}