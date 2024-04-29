<?php

class Contract {
    private $conn;
    private $table = 'contracts';

    public $p_id_contract;
    public $file;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for Contract class
}
