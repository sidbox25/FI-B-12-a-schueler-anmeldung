<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <title>Schueler Anmeldung vervaltungs software</title>
    <link rel="stylesheet" href="/src/HomePage/HomePageView/assets/main.layout.css">
</head>
<body>
<div class="main-container">
    <header>
        <img id="logo" src="src/HomePage/HomePageView/assets/logo.png"">
        <h1 class="header-text">Anmeldung zur Ausbildung als MFA / ZFA an der Rahel-Hirsch-Schule</h1>
    </header>
    <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include 'autoload.php';
        include "vendor/autoload.php";

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

        function handle_error(){
            echo("Das ist eine Fehlermeldung!");
        }

        set_error_handler("handle_error");

        // Get path without parameters
        $uri = parse_url($_SERVER['REQUEST_URI'])["path"];

        switch ($uri) {

            case '/':
                $homePageController = new HomePageController();
                $homePageController->showAction();
                break;
            
            case '/schulbesuch':
                $studentSchoolVisitsController = new StudentSchoolVisitsController();
                $studentSchoolVisitsController->showStudentSchoolVisitsAction();
                break;

            case '/schultage':
                $studentSchoolVisitsController = new StudentRegistrationApprenticeController();
                $studentSchoolVisitsController->studentRegistrationApprenticeViewAction();    
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
                $studentAgeController->studentAgeViewAction();    
                break;

            case '/geschafft':
                $geschafftTabController = new GeschafftTabController();
                $geschafftTabController->showGeschafftTabViewAction();
                break;

            default:
                $homePageController = new HomePageController();
                $homePageController->showAction();
                break;
        }

    ?>
</div>
</body>
</html>