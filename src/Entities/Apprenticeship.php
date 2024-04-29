<?php

class Apprenticeship {
    protected $conn;
    protected $table = 'apprenticeships';

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

    public function create() {
        $query = "INSERT INTO $this->table
                  SET company_name = :company_name, 
                      contact_person = :contact_person, 
                      company_phone_number = :company_phone_number, 
                      company_fax = :company_fax, 
                      company_mail = :company_mail, 
                      fk_id_contract = :fk_id_contract, 
                      fk_occupation_name_id = :fk_occupation_name_id";

        $stmt = $this->conn->prepare($query);

        $this->company_name = htmlspecialchars(strip_tags($this->company_name));
        $this->contact_person = htmlspecialchars(strip_tags($this->contact_person));
        $this->company_phone_number = htmlspecialchars(strip_tags($this->company_phone_number));
        $this->company_fax = htmlspecialchars(strip_tags($this->company_fax));
        $this->company_mail = htmlspecialchars(strip_tags($this->company_mail));
        $this->fk_id_contract = htmlspecialchars(strip_tags($this->fk_id_contract));
        $this->fk_occupation_name_id = htmlspecialchars(strip_tags($this->fk_occupation_name_id));

        $stmt->bindParam(':company_name', $this->company_name);
        $stmt->bindParam(':contact_person', $this->contact_person);
        $stmt->bindParam(':company_phone_number', $this->company_phone_number);
        $stmt->bindParam(':company_fax', $this->company_fax);
        $stmt->bindParam(':company_mail', $this->company_mail);
        $stmt->bindParam(':fk_id_contract', $this->fk_id_contract);
        $stmt->bindParam(':fk_occupation_name_id', $this->fk_occupation_name_id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}