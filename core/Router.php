<?php

class Router
{
    public static function route($url)
    {
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        $action = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
        array_shift($url);

        $queryParams = $url;

        $dispatch = new $controller($controller_name, $action);

        if (method_exists($controller, $action)) {
            call_user_func_array([$dispatch, $action], $queryParams);
        } else {
            self::redirect(DEFAULT_CONTROLLER);
        }
    }

    public static function redirect($path = null)
    {
        if (!$path) {
            header('Location: ' . PROOT);
        } else {
            header('Location: ' . PROOT . $path);
        }
    }
}