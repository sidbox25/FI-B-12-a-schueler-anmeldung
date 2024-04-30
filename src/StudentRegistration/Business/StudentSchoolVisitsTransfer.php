<?php

namespace src\StudentRegistration\Business;

class StudentSchoolVisitsTransfer
{
    private $graduation_name;
    private $last_visited_school;
    private $graduation_year;
    private $last_finished_apprenticeship;
    private $option_name;


    // Getter methods
    public function getGraduationName() {
        return $this->graduation_name;
    }

    public function getLastVisitedSchool() {
        return $this->last_visited_school;
    }

    public function getGraduationYear() {
        return $this->graduation_year;
    }

    public function getLastFinishedApprenticeship() {
        return $this->last_finished_apprenticeship;
    }

    public function getOptionName() {
        return $this->option_name;
    }

    // Setter methods
    public function setGraduationName($graduation_name) {
        $this->graduation_name = $graduation_name;
    }

    public function setLastVisitedSchool($last_visited_school) {
        $this->last_visited_school = $last_visited_school;
    }

    public function setGraduationYear($graduation_year) {
        $this->graduation_year = $graduation_year;
    }

    public function setLastFinishedApprenticeship($last_finished_apprenticeship) {
        $this->last_finished_apprenticeship = $last_finished_apprenticeship;
    }

    public function setOptionName($option_name) {
        $this->option_name = $option_name;
    }
}
