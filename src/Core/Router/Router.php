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

class Router 
{
    private static $instance = null;

    public static function getInstance() 
    {
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    /**
     * when called, route method calls the contructor of the controller
     * responsible for the given parameter $uri
     * @param uri String
     **/
    public function route($request_uri)
    {

        $uri = parse_url($_SERVER['REQUEST_URI'])["path"];

        switch ($uri) {

            case '/':
                $homePageController = new HomePageController();
                $homePageController->showAction();
                break;

            case '/persoenliche_daten':
                $studentPersonalDataController = new StudentPersonalDataController();
                $studentPersonalDataController->studentPersonalDataViewAction();    
                break;

            case '/wohnort':
                $studentResidenceController = new StudentResidenceController();
                $studentResidenceController->studentResidenceViewAction();    
                break;
            
            case '/alter':
                $studentAgeController = new StudentAgeController();
                $studentAgeController->showViewAction();    
                break;
            
            // Es fehlt noch die Ausbildungsseite
            //[...]
            
            case '/schulbesuch':
                $studentSchoolVisitsController = new StudentSchoolVisitsController();
                $studentSchoolVisitsController->showStudentSchoolVisitsAction();
                break;
            
            case '/geschafft':
                $geschafftTabController = new GeschafftTabController();
                $geschafftTabController->showGeschafftTabViewAction();
                break;

            /*
            case '/schultage':
                $studentSchoolVisitsController = new StudentRegistrationApprenticeController();
                $studentSchoolVisitsController->studentRegistrationApprenticeViewAction();    
                break;
            */

            default:
                http_response_code(404);
                $errorPageController = new E404Controller();
                $errorPageController->view();
                break;
        }
    }
}

?>