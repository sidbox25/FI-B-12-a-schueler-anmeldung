<?php

namespace src\StudentAge\Controller;
use src\StudentAge\Business\StudentAgeBusinessFactory;
use src\StudentAge\View\StudentAgeView;
class StudentAgeController
{
    public function studentAgeViewAction()
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