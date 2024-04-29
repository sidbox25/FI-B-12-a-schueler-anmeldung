<?php

class CompletedCourse extends BaseEntity {

    protected $conn;
    protected $table = 'completed_courses';

    public $p_course_id;
    public $course_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET course_name = :course_name";

        $stmt = $this->conn->prepare($query);

        $this->course_name = htmlspecialchars(strip_tags($this->course_name));

        $stmt->bindParam(':course_name', $this->course_name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}