<?php

class OccupationName {
    private $conn;
    private $table = 'occupation_names';

    public $p_occupation_name_id;
    public $occupation_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for OccupationName class
}