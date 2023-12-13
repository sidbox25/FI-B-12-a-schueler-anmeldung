<?php

namespace src\StudentRegistration\View;

class StudentRegistrationApprenticeshipView
{
    
    public function renderFileUploadForm()
    {       
        echo "
        <form method='post' enctype='multipart/form-data'>
            <input type='file' name='uploadFile'>
            <input type='submit' value='Datei hochladen'>
        </form>
        ";
    }
}
