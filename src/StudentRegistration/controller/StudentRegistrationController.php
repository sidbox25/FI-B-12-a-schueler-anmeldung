<?php

namespace src\StudentRegistration\controller;
use src\StudentRegistration\Business\StudentRegistrationBusinessFactory;
use src\StudentRegistration\view\studentanmeldeform;
class StudentRegistrationController
{

    public function studentanmeldeformAction()
    {
        $studentRegistrationBusinessFactory = new StudentRegistrationBusinessFactory();

        $createStudentRegistrationBusiness = $studentRegistrationBusinessFactory->createStudentRegistrationBusiness();
        
        
        $this->view($createStudentRegistrationBusiness->getDaten());
        
    }

    public function view($daten)
    {
        $studentanmeldeform = new studentanmeldeform();
        return $studentanmeldeform->createtable($daten);
    }
}