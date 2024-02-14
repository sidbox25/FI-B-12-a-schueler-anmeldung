<?php

namespace src\StudentAge\View;
class StudentAgeView
{
    public function createStudentAgeInputForm(array $data)
    {
        echo file_get_contents("src/StudentAge/View/StudentAgeView.html");
    }
}