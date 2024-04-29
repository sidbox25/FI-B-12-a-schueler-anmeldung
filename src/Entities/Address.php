<?php
class Address {

    private $conn;
    private $table = 'addresses';

    public $p_address_id;
    public $address_details;
    public $zipcode;
    public $city;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Implement create method
    }

    public function read() {
        // Implement read method
    }

    public function update() {
        // Implement update method
    }

    public function delete() {
        // Implement delete method
    }
}