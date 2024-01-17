<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
    <title>Schueler Anmeldung vervaltungs software</title>
    <link rel="stylesheet" href="/src/HomePage/HomePageView/assets/main.layout.css">
</head>
<body>
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
    use src\StudentRegistration\Controller\StudentRegistrationController;
    use src\StudentRegistration\Controller\StudentSchoolVisitsController;
    //use src\UploadPdf\Controller\StudentRegistrationApprenticeshipController;
    use src\Core\Connector;

    if ($_SERVER['REQUEST_URI'] === '/') {
        $homePageController = new HomePageController();
        $homePageController->showAction();
    }

    if ($_SERVER['REQUEST_URI'] === '/foo') {
        $studentRegistrationController = new StudentRegistrationController();
        $studentRegistrationController->StudentRegistrationViewAction();
    }
    if($_SERVER['REQUEST_URI'] === '/boo') {
        $connection = (new Connector())->getConnection();
        var_dump($connection);
        $stm = $connection->prepare("INSERT INTO test.test2 (user) VALUES (:name) ");
        $name = "sidney";
        $stm->bindParam(':name',$name);
        $stm->execute();
    }
    if($_SERVER['REQUEST_URI'] === '/schulbesuch') {
        $studentSchoolVisitsController = new StudentSchoolVisitsController();
        $studentSchoolVisitsController->showStudentSchoolVisitsAction();
    }
    if($_SERVER['REQUEST_URI'] === '/schultage') {
        $studentSchoolVisitsController = new StudentSchoolVisitsController();
        $studentSchoolVisitsController->saveSchoolVisitsDataAction();
    }
    if($_SERVER['REQUEST_URI'] === '/personalData') {
        $studentPersonalDataController = new StudentPersonalDataController();
        $studentPersonalDataController->studentPersonalDataViewAction();
    }

    if($_SERVER['REQUEST_URI'] === '/geschafft') {
        $geschafftTabController = new GeschafftTabController();
        $geschafftTabController->showGeschafftTabViewAction();
    }

    // if ($_SERVER['REQUEST_URI'] === '/weiter') {
    //$studentRegistrationApprenticeshipController = new \src\UploadPdf\Controller\StudentRegistrationApprenticeshipController();
    //$studentRegistrationApprenticeshipController->StudentRegistrationApprenticeshipViewAction();
    //}


    ?>
</body>
</html>