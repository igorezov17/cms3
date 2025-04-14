<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = 
        [
            'name' => "Master Plkusman 111",
            'surname' => "Pussik"
        ];
        $this->view->render('index', $data);
    }

    public function news($id = null)
    {
        print_r("This is HomeController and method NEWS = " . $id);
    }
}