<?php

namespace src\StudentPersonalData\Controller;
use src\StudentPersonalData\Business\StudentPersonalDataBusinessFactory;
use src\StudentPersonalData\View\StudentPersonalDataView;
class StudentPersonalDataController
{
    public function studentPersonalDataViewAction()
    {
        $StudentPersonalDataBusinessFactory = new StudentPersonalDataBusinessFactory();

        $StudentPersonalDataBusiness = $StudentPersonalDataBusinessFactory->createStudentPersonalDataBusiness();
        
        $this->view($StudentPersonalDataBusiness->getDaten()); #sortof like a echo
    }

    public function view($daten)
    {
        $StudentPersonalDataView = new StudentPersonalDataView();
        $StudentPersonalDataView->createStudentPersonalDataInputForm($daten);
    }
}

#StudentPersonalDataView