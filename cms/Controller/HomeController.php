<?php

namespace Cms\Controller;

use Engine\Controller;

class HomeController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function index()
    {
        return "This is HomeController and method index";
    }
}