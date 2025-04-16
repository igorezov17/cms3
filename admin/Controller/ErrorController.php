<?php

namespace Admin\Controller;

class ErrorController extends AdminController
{
    public function page404()
    {
        print_r('404 Not found');
    }
}