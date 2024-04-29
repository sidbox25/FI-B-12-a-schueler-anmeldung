<?php

class OccupationName extends BaseEntity
{
    protected $conn;
    protected $table = 'occupation_names';

    public $p_occupation_name_id;
    public $occupation_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET occupation_name = :occupation_name";

        $stmt = $this->conn->prepare($query);

        $this->occupation_name = htmlspecialchars(strip_tags($this->occupation_name));

        $stmt->bindParam(':occupation_name', $this->occupation_name);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}