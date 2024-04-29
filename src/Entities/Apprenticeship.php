<?php

class Apprenticeship {
    private $conn;
    private $table = 'apprenticeships';

    public $p_apprenticeship_id;
    public $company_name;
    public $contact_person;
    public $company_phone_number;
    public $company_fax;
    public $company_mail;
    public $fk_id_contract;
    public $fk_occupation_name_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Implement CRUD methods for Apprenticeship class
}