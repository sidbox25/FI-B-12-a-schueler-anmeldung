<?php

namespace src\StudentPersonalData\Business;

class StudentPersonalDataBusinessFactory
{
    public function createStudentPersonalDataBusiness(): StudentPersonalDataBusiness
    {    
        return new StudentPersonalDataBusiness();
    }
}
