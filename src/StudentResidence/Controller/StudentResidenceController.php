<?php

namespace src\StudentResidence\Controller;
use src\StudentResidence\Business\StudentResidenceBusinessFactory;
use src\StudentResidence\View\StudentResidenceView;
class StudentResidenceController
{
    public function studentResidenceViewAction()
    {
        $StudentResidenceBusinessFactory = new StudentResidenceBusinessFactory();

        $StudentResidenceBusiness = $StudentResidenceBusinessFactory->createStudentResidenceBusiness();
        
        $this->view($StudentResidenceBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $StudentResidenceView = new StudentResidenceView();
        $StudentResidenceView->createStudentResidenceInputForm($daten);
    }
}