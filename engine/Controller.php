<?php 

namespace Engine;

use Engine\DI\DI;

abstract class Controller
{
    protected $di;

    protected $db;

    protected $view;

    public function __construct(DI $di)
    {
        $this->di   = $di;
        $this->db   = $this->di->get('db');
        $this->view = $this->di->get('view');
    }
}