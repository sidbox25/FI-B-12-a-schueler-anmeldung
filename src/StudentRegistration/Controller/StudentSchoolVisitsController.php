<?php

namespace src\StudentRegistration\Controller;
use src\StudentRegistration\Business\StudentSchoolVisitsBusinessFactory;
use src\StudentRegistration\View\StudentSchoolVisitsView;
class StudentSchoolVisitsController
{

    public function showStudentSchoolVisitsAction()
    {
        $this->view(); #sortof like a echo
    }

    public function view()
    {
        $StudentSchoolVisitsView = new StudentSchoolVisitsView();
        return $StudentSchoolVisitsView->showForm();
    }

    public function saveSchoolVisitsDataAction()
    {
        $studentSchoolVisitsBusinessFactory = new StudentSchoolVisitsBusinessFactory();

        $studentSchoolVisitsBusiness = $studentSchoolVisitsBusinessFactory->createStudentSchoolVisitsBusiness();
        $postData = $_POST;

        $studentSchoolVisitsBusiness->save($postData);


    }
}

#StudentRegistrationView