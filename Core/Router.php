<?php

namespace Core;

class Router
{
  private static $routes;
  public static function connect($url, $route)
  {
    self::$routes[$url] = $route;
  }
  function instanceRoute($route)
  {
    $route = array_filter($route);
    $route = array_values($route);
    $controller = ucfirst($route[0]) . "Controller";
    $action = isset($route[1]) ? $route[1] . "Action": "indexAction";
    $_REQUEST["id"] = isset($route[2]) ? $route[2]: "";
    var_dump($_REQUEST);
    return compact("controller", "action");
  }
  static function get($url)
  {
    $element = explode("/", $url);
    if (isset(self::$routes[$url])) {
      $routes = (new self)->instanceRoute(self::$routes[$url]);
    } else {
      $routes = (new self)->instanceRoute($element);
    }
    // var_dump($routes);
    return $routes;
  }
}
