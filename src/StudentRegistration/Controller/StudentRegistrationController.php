<?php

namespace src\StudentRegistration\Controller;
use src\StudentRegistration\Business\StudentRegistrationBusinessFactory;
use src\StudentRegistration\View\StudentRegistrationView;

class StudentRegistrationController
{


    public function StudentRegistrationViewAction()
    {
        $studentRegistrationBusinessFactory = new StudentRegistrationBusinessFactory();

        $studentRegistrationBusiness = $studentRegistrationBusinessFactory->createStudentRegistrationBusiness();
        
        $this->view($studentRegistrationBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $StudentRegistrationView = new StudentRegistrationView();
        $StudentRegistrationView->createtable($daten);
    }
}

#StudentRegistrationView