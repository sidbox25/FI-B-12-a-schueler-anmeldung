<?php

namespace src\StudentRegistration\Controller;

use src\StudentRegistration\View\StudentRegistrationApprenticeshipView;
use src\StudentRegistration\Business\StudentRegistrationApprenticeshipBusinessFactory;

class StudentRegistrationApprenticeController
{
    private $uploadDirectory;

    public function studentRegistrationApprenticeViewAction()
    {
        $studentRegistrationBusinessFactory = new StudentRegistrationApprenticeshipBusinessFactory();
        $studentRegistrationBusiness = $studentRegistrationBusinessFactory->createStudentRegistrationBusiness();
        $this->uploadDirectory = $studentRegistrationBusiness->fileServerName();
        $this->viewAction();    
    }

    public function viewAction()
    {
        $StudentRegistrationApprenticeshipView = new StudentRegistrationApprenticeshipView();
        $StudentRegistrationApprenticeshipView->renderFileUploadForm($this->uploadDirectory);
    }

    public function handleFileUpload()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $uploadDirectory = $this->uploadDirectory;

            // Überprüfen, ob das Verzeichnis existiert und beschreibbar ist
            if (!is_dir($uploadDirectory) || !is_writable($uploadDirectory)) {
                die("Das Zielverzeichnis existiert nicht oder ist nicht beschreibbar.");
            }

            // Überprüfen, ob eine Datei hochgeladen wurde
            if (isset($_FILES['uploadFile']) && $_FILES['uploadFile']['error'] === UPLOAD_ERR_OK) {
                $uploadedFile = $_FILES['uploadFile'];

                // Dateityp überprüfen (nur PDF-Dateien erlauben)
                $allowedTypes = ['application/pdf'];
                $fileType = mime_content_type($uploadedFile['tmp_name']);

                if (!in_array($fileType, $allowedTypes)) {
                    echo "Es sind nur PDF-Dateien erlaubt.";
                } else {
                    // Dateinamen sicher behandeln und in das Zielverzeichnis verschieben
                    $fileName = basename($uploadedFile['name']);
                    $destination = $uploadDirectory . '/' . $fileName;

                    if (move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
                        echo "Die Datei wurde erfolgreich hochgeladen.";
                    } else {
                        echo "Beim Hochladen der Datei ist ein Fehler aufgetreten.";
                    }
                }
            } else {
                echo "Es wurde keine Datei ausgewählt oder ein Fehler ist aufgetreten.";
            }
         }     
    }
}

