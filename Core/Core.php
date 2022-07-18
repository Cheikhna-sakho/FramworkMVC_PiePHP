<?php

namespace Core;

class Core
{
    public function run()
    {
        require_once(implode(DIRECTORY_SEPARATOR, ['src', 'routes.php']));
        $url = rtrim($_SERVER['REQUEST_URI']);
        $route = \Core\Router::get($url);
        $controller = $route["controller"];
        $action = $route["action"];

        if (class_exists("\Controller\\{$controller}")) {
            $newController = "\Controller\\{$controller}";

        } else {
            $newController = "\Controller\UserController";
        }
        $newClass = new $newController();
        $newClass->$action();
    }
}
