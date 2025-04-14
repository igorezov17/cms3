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
            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('news', '/news', 'HomeController:news');
            $this->router->add('news_single', '/news/(id:int)', 'HomeController:news');
            $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getUrl());
    
            if ($routeDispatch == null) {
                $routeDispatch = new DispatchedRoute('ErrorController:page404');
            }
    
            list($class, $action) = explode(':', $routeDispatch->getController(), 2);
    
    
    
            $controller = "\\Cms\\Controller\\" . $class; 
            $parameters = $routeDispatch->getParameters() ? $routeDispatch->getParameters() : [];
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch(\Exception $e) {
            print_r($e->getMessage());
            exit;
        }

      
    }
}