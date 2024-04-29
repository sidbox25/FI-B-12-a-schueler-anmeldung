<?php

class SchoolGraduation {
    private $conn;
    private $table = 'school_graduations';

    public $p_graduation_id;
    public $graduation_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for SchoolGraduation class
}