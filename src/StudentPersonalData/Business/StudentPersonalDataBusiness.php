<?php

namespace src\StudentPersonalData\Business;

class StudentPersonalDataBusiness
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

    public function saveUploadedFile()
    {
        if (isset($_FILES["file"])) {
        $updloadedFile = $_FILES["file"];
        if (isset($_POST["submit"])) {
            // save file when database is done !
        }
        }
        
        return "";
    }
}