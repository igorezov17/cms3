<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    protected $auth;

    public function __construct($di)
    {
        parent::__construct($di);
        $this->auth = new Auth();
        $this->checkAuthorization();
    }

    public function checkAuthorization()
    {
        if (!$this->auth->authorized()) {
            header('Location: /admin/login/', true, 301);
            exit;
        }
    }
}