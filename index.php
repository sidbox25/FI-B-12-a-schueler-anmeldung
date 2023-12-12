<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Schueler Anmeldung vervaltungs software</title>
</head>
<body>
    <p> u are stoopid hon hon hon(mocks u in french)</p>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'autoload.php';

    
    use src\StudentRegistration\controller\StudentRegistrationController;
    echo "checkpoint 1";
    $controller = new StudentRegistrationController();
    $controller->studentanmeldeformAction();

    ?>

</body>

</html>