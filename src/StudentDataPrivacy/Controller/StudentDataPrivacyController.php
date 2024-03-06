<?php

namespace src\StudentDataPrivacy\Controller;

use src\StudentDataPrivacy\View;

class StudentDataPrivacyController
{

    public function showAction()
    {
        $this->view(); #sortof like a echo
    }

    public function view()
    {
        $mainView = new View();
        $mainView->createStudentDataPrivacyForm();
    }

}