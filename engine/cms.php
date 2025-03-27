<?php

namespace Engine;

use Engine\Helper\Common;

class Cms {

    private $di;

    public $router;

    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('news', '/news', 'HomeController:news');
        $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getUrl());



        list($class, $action) = explode(':', $routeDispatch->getController(), 2);



        $controller = "\\Cms\\Controller\\" . $class; 
        call_user_func_array([new $controller($this->di), $action], $routeDispatch->getParameters());

        // return $class . " = " . $action;

    }
}