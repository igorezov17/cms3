<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    private $serviceName = 'router';

    public function init()
    {
        $router = new Router('http://cms3/'); 
        $this->di->set($this->serviceName, $router);
    }
}