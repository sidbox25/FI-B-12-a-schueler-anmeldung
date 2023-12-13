<?php

namespace src\StudentRegistration\Business;

class StudentRegistrationApprenticeshipBusinessFactory
{
    public function createStudentRegistrationBusiness(): StudentRegistrationApprenticeshipBusiness
    {    
        return new StudentRegistrationApprenticeshipBusiness();
    }
}
