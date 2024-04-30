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

       $saveFiles = $StudentPersonalDataBusiness->saveUploadedFile();

        
        $this->view($StudentPersonalDataBusiness->getDaten()); #sortof like a echo

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
        }

    }

    public function view($daten)
    {
        $StudentPersonalDataView = new StudentPersonalDataView();
        $StudentPersonalDataView->createStudentPersonalDataInputForm($daten);
    }
}

#StudentPersonalDataView