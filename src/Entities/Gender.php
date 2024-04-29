<?php

class Gender {
    private $conn;
    private $table = 'genders';

    public $p_gender_id;
    public $gender;
    public $salutation;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for Gender class
}