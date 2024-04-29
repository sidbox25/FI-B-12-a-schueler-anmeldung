<?php

class LegalGuardian {
    private $conn;
    private $table = 'legal_guardians';

    public $p_parent_id;
    public $f_student_id;
    public $f_gender_id;
    public $f_address_id;
    public $lastname;
    public $firstname;
    public $telefon_number;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for LegalGuardian class
}
