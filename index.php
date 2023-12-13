<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Schueler Anmeldung vervaltungs software</title>
    <link rel="stylesheet" href="src/StudentPersonalData/View/studentPersonalDataStyles.css">
</head>
<body>
    <p> u are stoopid hon hon hon(mocks u in french)</p>
    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'autoload.php';

    use src\StudentPersonalData\Controller\StudentPersonalDataController;
    use src\StudentRegistration\Controller\StudentRegistrationController;


    if($_SERVER['REQUEST_URI'] === '/foo') {
        $studentRegistrationController = new StudentRegistrationController();
        $studentRegistrationController->StudentRegistrationViewAction();
    }
    if($_SERVER['REQUEST_URI'] === '/boo') {
        echo "honhonhon";
    }

    use src\StudentRegistration\Controller\StudentSchoolVisitsController;
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



    ?>

</body>

</html>