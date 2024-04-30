<?php

namespace src\Core\Router;
use src\GeschafftTab\Controller\GeschafftTabController;
use src\HomePage\HomePageController\HomePageController;
use src\StudentPersonalData\Controller\StudentPersonalDataController;
use src\StudentRegistration\Controller\StudentRegistrationApprenticeController;
use src\StudentRegistration\Controller\StudentRegistrationController;
use src\StudentRegistration\Controller\StudentSchoolVisitsController;
//use src\UploadPdf\Controller\StudentRegistrationApprenticeshipController;
use src\StudentResidence\Controller\StudentResidenceController;
use src\StudentAge\Controller\StudentAgeController;
use src\Core\Connector;
use src\Error\E404\Controller\E404Controller;

include 'autoload.php';
include "vendor/autoload.php";

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

    public function addRoute($uri, $controller, $action, $methods = ['GET'])
    {
        $this->routes[$uri] = ['controller' => $controller, 'action' => $action, 'methods' => $methods];
    }

    public function route($request_uri, $request_method)
    {
        $uri = parse_url($request_uri)["path"];

        if (array_key_exists($uri, $this->routes)) {
            $route = $this->routes[$uri];
            if (in_array($request_method, $route['methods'])) {
                $controllerName = $route['controller'];
                $action = $route['action'];
                $controller = new $controllerName();
                $controller->$action();
                return;
            }
        }

        http_response_code(404);
        $errorPageController = new E404Controller();
        $errorPageController->view();
    }
}

?>