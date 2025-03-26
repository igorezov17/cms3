<?php

namespace Engine\Helper;

class Common
{

    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }

        return false;
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}