<?php

namespace src\StudentAge\Controller;
use src\StudentAge\Business\StudentAgeBusinessFactory;
use src\StudentAge\View\StudentAgeView;
use src\Core\Controller;
class StudentAgeController implements Controller
{
    public function showViewAction()
    {
        $StudentAgeBusinessFactory = new StudentAgeBusinessFactory();

        $StudentAgeBusiness = $StudentAgeBusinessFactory->createStudentAgeBusiness();
        
        $this->view($StudentAgeBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $StudentAgeView = new StudentAgeView();
        $StudentAgeView->createStudentAgeInputForm($daten);
    }
}