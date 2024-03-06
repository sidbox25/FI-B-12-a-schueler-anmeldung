<?php
namespace src\StudentRegistration\View;

class StudentRegistrationApprenticeshipView
{
    public function renderFileUploadForm($uploadDirectory)
    {
        include __DIR__ . '/../../templates/file_upload_form.php';
    }
}


