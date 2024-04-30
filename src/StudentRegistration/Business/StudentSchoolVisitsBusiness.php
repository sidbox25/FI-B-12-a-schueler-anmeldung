<?php

namespace src\StudentRegistration\Business;
class StudentSchoolVisitsBusiness
{
    public function buildTransfer(){
        $studentSchoolVisitTransfer = new StudentSchoolVisitsTransfer();
        if(isset($_GET)) {
            $studentSchoolVisitTransfer->setGraduationName($_GET['schulabschluss']);
            $studentSchoolVisitTransfer->setLastVisitedSchool($_GET['last_school']);
        }
        
        
    }
}