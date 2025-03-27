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
        print_r("This is HomeController and method index");
    }

    public function news()
    {
        print_r("This is HomeController and method NEWS");
    }
}