<?php

namespace src\StudentRegistration\controller;
use src\StudentRegistration\Business\StudentRegistrationBusinessFactory;
use src\StudentRegistration\view\StudentRegistrationView;
class StudentRegistrationController
{

    public function StudentRegistrationViewAction()
    {
        $studentRegistrationBusinessFactory = new StudentRegistrationBusinessFactory();

        $createStudentRegistrationBusiness = $studentRegistrationBusinessFactory->createStudentRegistrationBusiness();
        
        
        $this->view($createStudentRegistrationBusiness->getDaten());
        
    }

    public function view($daten)
    {
        $StudentRegistrationView = new StudentRegistrationView();
        return $StudentRegistrationView->createtable($daten);
    }
}

#StudentRegistrationView