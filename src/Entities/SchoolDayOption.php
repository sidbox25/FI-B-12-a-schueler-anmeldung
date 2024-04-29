<?php

class SchoolDayOption {
    private $conn;
    private $table = 'school_day_options';

    public $p_school_day_options_id;
    public $school_day_option;
    public $school_year;
    public $school_semester;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for SchoolDayOption class
}