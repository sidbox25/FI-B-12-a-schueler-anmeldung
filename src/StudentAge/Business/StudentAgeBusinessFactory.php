<?php

namespace src\StudentAge\Business;

class StudentAgeBusinessFactory
{
    public function createStudentAgeBusiness(): StudentAgeBusiness
    {    
        return new StudentAgeBusiness();
    }
}
