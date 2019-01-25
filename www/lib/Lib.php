<?php

class Lib
{
    public static $required = ['Fn'];

    public static function require($name)
    {
        if (in_array($name, self::$required)) {
            return 0;
        } 

        $lib_file = __DIR__ . '/' . $name . '.php';

        if (is_file($lib_file)) {
            self::$required[] = $name;
            require $lib_file;
            return 1;
        }
        
        return -1;
    }
}