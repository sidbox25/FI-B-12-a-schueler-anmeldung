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

        function handle_error(){
            echo("Das ist eine Fehlermeldung!");
        }

        set_error_handler("handle_error");

        // Get path without parameters
        $request = $_SERVER['REQUEST_URI'];

        $router = Router::getInstance();
        $router->route($request);

    ?>
</div>
</body>
</html>