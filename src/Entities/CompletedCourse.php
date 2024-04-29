<?php

class CompletedCourse {
    private $conn;
    private $table = 'completed_courses';

    public $p_course_id;
    public $course_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for CompletedCourse class
}