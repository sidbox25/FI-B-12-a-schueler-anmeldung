<?php

namespace src\Core;
/**
 * Interface for MVC Controllers, implement showAction() as the entry method for the controller.
 */
interface Controller {
    function showViewAction();
    function view($data);
}

?>