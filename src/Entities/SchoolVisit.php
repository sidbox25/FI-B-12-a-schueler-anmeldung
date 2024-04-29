<?php

class SchoolVisit {
    private $conn;
    private $table = 'school_visit';

    public $pf_students_id;
    public $last_visited_school;
    public $last_finished_apprenticeship;
    public $graduation_year;
    public $f_option_id;
    public $f_graduation_id;
    public $f_course_id;
    public $fk_school_day_options_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for SchoolVisit class
}