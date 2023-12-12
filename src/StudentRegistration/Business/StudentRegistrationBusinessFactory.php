<?php

namespace src\StudentRegistration\Business;

class StudentRegistrationBusinessFactory
{
    public function createStudentRegistrationBusiness(): StudentRegistrationBusiness
    {    
        return new StudentRegistrationBusiness();
    }
}
