<?php

namespace src\StudentDataPrivacy\Controller;

use src\StudentDataPrivacy\View;

class StudentDataPrivacyController
{

    public function showAction()
    {
        $this->view(); #sortof like a echo

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
        }

    }

    public function view()
    {
        $studentDataPrivacyView = new View\StudentDataPrivacyView();
        $studentDataPrivacyView->createStudentDataPrivacyForm();
    }

}