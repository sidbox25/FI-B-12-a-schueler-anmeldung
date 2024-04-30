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
    <header class="fade-in-bck">
        <img id="logo" src="src/HomePage/HomePageView/assets/logo.png"">
        <h1 class="header-text">Anmeldung zur Ausbildung als MFA / ZFA an der Rahel-Hirsch-Schule</h1>
    </header>
    <?php

    use src\Core\Router\Router;

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'autoload.php';
    include "vendor/autoload.php";

    $router = Router::getInstance();

    $router->addRoute('/', 'src\HomePage\HomePageController\HomePageController', 'showAction', ['GET']);
    $router->addRoute('/persoenliche_daten', 'src\StudentPersonalData\Controller\StudentPersonalDataController', 'studentPersonalDataViewAction', ['POST','GET']);
    $router->addRoute('/wohnort', 'src\StudentResidence\Controller\StudentResidenceController', 'studentResidenceViewAction', ['GET']);
    $router->addRoute('/alter', '\src\StudentAge\Controller\StudentAgeController', 'showViewAction', ['GET']);
    $router->addRoute('/schulbesuch', 'src\StudentRegistration\Controller\StudentSchoolVisitsController', 'showStudentSchoolVisitsAction', ['GET']);
    $router->addRoute('/geschafft', '\src\GeschafftTab\Controller\GeschafftTabController', 'showGeschafftTabViewAction', ['GET']);


    $router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

    ?>
</div>
</body>
</html>