<?php

namespace src\StudentRegistration\Business;
class StudentRegistrationBusiness
{

    public function __construct()
    {
    }

    public function foo(): string
    {
        return "bar";
    }

    public function getDaten(): array
    {
        $daten = array(
            array("Name", "Alter", "Stadt"),
            array("Max Mustermann", 25, "Musterstadt"),
            array("Erika Musterfrau", 30, "Teststadt"),
            array("John Doe", 22, "Example City")
        );

        return $daten;
    }
}