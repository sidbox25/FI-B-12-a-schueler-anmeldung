<?php

class Gender extends BaseEntity
{
    protected $conn;
    protected $table = 'genders';

    private $p_gender_id;
    private $gender;
    private $salutation;

    public function __construct($db) {
        parent::__construct($db);
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET gender = :gender, 
                      salutation = :salutation";

        $stmt = $this->conn->prepare($query);

        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->salutation = htmlspecialchars(strip_tags($this->salutation));

        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':salutation', $this->salutation);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPGenderId()
    {
        return $this->p_gender_id;
    }

    /**
     * @param mixed $p_gender_id
     */
    public function setPGenderId($p_gender_id)
    {
        $this->p_gender_id = $p_gender_id;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param mixed $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }
}