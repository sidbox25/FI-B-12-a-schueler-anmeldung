<?php

class SchoolGraduation extends BaseEntity
{
    protected $conn;
    protected $table = 'school_graduations';

    public $p_graduation_id;
    public $graduation_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET graduation_name = :graduation_name";

        $stmt = $this->conn->prepare($query);

        $this->graduation_name = htmlspecialchars(strip_tags($this->graduation_name));

        $stmt->bindParam(':graduation_name', $this->graduation_name);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}