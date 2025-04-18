<?php

namespace Engine\Helper;

class Cookie
{
    public static function set($key, $value, $time = 31536000)
    {
        return setcookie($key, $value, time() +  $time, '/');
    }

    public static function get($key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }

        return null;
    }

    public static function delete($key)
    {
        if ($_COOKIE[$key]) {
            self::set($_COOKIE[$key], '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}

