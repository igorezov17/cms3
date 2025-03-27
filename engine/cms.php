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
        $this->router->add('user', '/user/34', 'UserController:indexUs');
        $routeDispatch = $this->router->dispatch(Common::getMethod(), Common::getUrl());

        list($cl, $ac) = explode(':', $routeDispatch->getController());

        return $routeDispatch ;

    }
}