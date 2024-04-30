<?php

class LegalGuardian extends BaseEntity
{
    protected $conn;
    protected $table = 'legal_guardians';

    private $p_parent_id;
    private $f_student_id;
    private $f_gender_id;
    private $f_address_id;
    private $lastname;
    private $firstname;
    private $telefon_number;

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

    /**
     * @return mixed
     */
    public function getPParentId()
    {
        return $this->p_parent_id;
    }

    /**
     * @param mixed $p_parent_id
     */
    public function setPParentId($p_parent_id)
    {
        $this->p_parent_id = $p_parent_id;
    }

    /**
     * @return mixed
     */
    public function getFStudentId()
    {
        return $this->f_student_id;
    }

    /**
     * @param mixed $f_student_id
     */
    public function setFStudentId($f_student_id)
    {
        $this->f_student_id = $f_student_id;
    }

    /**
     * @return mixed
     */
    public function getFGenderId()
    {
        return $this->f_gender_id;
    }

    /**
     * @param mixed $f_gender_id
     */
    public function setFGenderId($f_gender_id)
    {
        $this->f_gender_id = $f_gender_id;
    }

    /**
     * @return mixed
     */
    public function getFAddressId()
    {
        return $this->f_address_id;
    }

    /**
     * @param mixed $f_address_id
     */
    public function setFAddressId($f_address_id)
    {
        $this->f_address_id = $f_address_id;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getTelefonNumber()
    {
        return $this->telefon_number;
    }

    /**
     * @param mixed $telefon_number
     */
    public function setTelefonNumber($telefon_number)
    {
        $this->telefon_number = $telefon_number;
    }

}
