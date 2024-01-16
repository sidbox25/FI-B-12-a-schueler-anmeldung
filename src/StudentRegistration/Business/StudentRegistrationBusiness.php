<?php

namespace src\StudentRegistration\Business;
use src\StudentRegistration\Persistence\StudentRegistrationEntityManager;
class StudentRegistrationBusiness
{
    public function fileServerName():string
    {
        $uploadDirectory = '//PFAD//FILESERVER'; // Pfad zum Fileserver
        return $uploadDirectory;
    }

    public function __construct()
    {
    }

    public function foo(): string
    {
        return "bar";
    }

    public function getDaten(): array
    {
        #todo make work
        #$entityManager = new StudentRegistrationEntityManager();
        #$tempDaten = $entityManager->getAllStudents();
        
        $daten = array(
            array("Name", "Alter", "Stadt"),
            array("Max Mustermann", 25, "Musterstadt"),
            array("Erika Musterfrau", 30, "Teststadt"),
            array("John Doe", 22, "Example City")
        );

        return $daten;
    }

   

   
}