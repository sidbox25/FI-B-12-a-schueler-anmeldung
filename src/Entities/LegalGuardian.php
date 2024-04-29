<?php

class LegalGuardian extends BaseEntity
{
    protected $conn;
    protected $table = 'legal_guardians';

    public $p_parent_id;
    public $f_student_id;
    public $f_gender_id;
    public $f_address_id;
    public $lastname;
    public $firstname;
    public $telefon_number;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function create(): bool
    {
        $query = "INSERT INTO $this->table
                  SET f_student_id = :f_student_id,
                      f_gender_id = :f_gender_id,
                      f_address_id = :f_address_id,
                      lastname = :lastname,
                      firstname = :firstname,
                      telefon_number = :telefon_number";

        $stmt = $this->conn->prepare($query);

        $this->f_student_id = htmlspecialchars(strip_tags($this->f_student_id));
        $this->f_gender_id = htmlspecialchars(strip_tags($this->f_gender_id));
        $this->f_address_id = htmlspecialchars(strip_tags($this->f_address_id));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->telefon_number = htmlspecialchars(strip_tags($this->telefon_number));

        $stmt->bindParam(':f_student_id', $this->f_student_id);
        $stmt->bindParam(':f_gender_id', $this->f_gender_id);
        $stmt->bindParam(':f_address_id', $this->f_address_id);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':telefon_number', $this->telefon_number);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
