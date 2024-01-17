<?php

namespace src\StudentResidence\Business;

class StudentResidenceBusinessFactory
{
    public function createStudentResidenceBusiness(): StudentResidenceBusiness
    {    
        return new StudentResidenceBusiness();
    }
}
