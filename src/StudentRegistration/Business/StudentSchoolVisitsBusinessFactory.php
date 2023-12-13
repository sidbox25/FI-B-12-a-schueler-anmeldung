<?php

namespace src\StudentRegistration\Business;

class StudentSchoolVisitsBusinessFactory
{
    public function createStudentSchoolVisitsBusiness(): StudentSchoolVisitsBusiness
    {    
        return new StudentSchoolVisitsBusiness();
    }
}
