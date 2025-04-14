<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        print_r("This is HomeController and method index");
    }

    public function news()
    {
        print_r("This is HomeController and method NEWS");
    }
}