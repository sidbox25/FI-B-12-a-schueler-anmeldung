<?php

namespace src\Core\Router;

use src\Error\E404\Controller\E404Controller;

class Router
{
    private static $instance = null;
    private $routes = [];

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function addRoute($uri, $controller, $action)
    {
        $this->routes[$uri] = ['controller' => $controller, 'action' => $action];
    }

    public function route($request_uri)
    {
        $uri = parse_url($request_uri)["path"];

        if (array_key_exists($uri, $this->routes)) {
            $route = $this->routes[$uri];

                $controllerName = $route['controller'];
                $action = $route['action'];
                $controller = new $controllerName();
                $controller->$action();
                return;

        }

        http_response_code(404);
        $errorPageController = new E404Controller();
        $errorPageController->view();
    }
}

?>