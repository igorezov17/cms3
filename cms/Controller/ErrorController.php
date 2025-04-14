<?php

namespace Cms\Controller;


class ErrorController extends CmsController
{
    public function page404()
    {
        print_r('404 Not found');
    }
}