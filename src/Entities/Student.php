<?php

class Student {
    private $conn;
    private $table = 'students';

    public $p_student_id;
    public $first_name;
    public $last_name;
    public $birth_date;
    public $city_of_birth;
    public $country_of_birth;
    public $nationality;
    public $parents_language_of_birth;
    public $email;
    public $mobile_numbers;
    public $phone;
    public $consent_photos;
    public $lives_with;
    public $emergency_contact;
    public $emergency_contact_phone;
    public $fk_apprenticeship_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for Student class
}