<?php

class Gender extends BaseEntity
{
    protected $conn;
    protected $table = 'genders';

    public $p_gender_id;
    public $gender;
    public $salutation;

    public function __construct($db)
    {
        $this->conn = $db;
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
}