<?php

namespace src\StudentResidence\View;
class StudentResidenceView
{
    public function createStudentResidenceInputForm(array $data)
    {
        echo file_get_contents("src\StudentResidence\View\StudentResidenceView.html");
    }
}