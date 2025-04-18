<?php

namespace Engine\Service\Request;

use Engine\Service\AbstractProvider;
use Engine\Core\Request\Request;

class Provider extends AbstractProvider
{
    private $serviceName = 'request';

    public function init()
    {
        $router = new Request(); 
        $this->di->set($this->serviceName, $router);
    }
}