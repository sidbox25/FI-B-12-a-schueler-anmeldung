<?php

namespace src\Error\E404\View;

use src\Error\E404\Controller\E404Controller;

class E404View
{
    public function createErrorPage()
    {
        echo file_get_contents("src/Error/E404/View/E404View.html");
    }
}


/*
-> ".../Routing/..."
-> check for E404Controller

Router
-> UrlConfig.php (static-urls)
*/