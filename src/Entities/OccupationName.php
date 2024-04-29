<?php

class OccupationName extends BaseEntity
{
    protected $conn;
    protected $table = 'occupation_names';

    private $p_occupation_name_id;
    private $occupation_name;

    public function __construct($db) {
        parent::__construct($db);
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

    /**
     * @return mixed
     */
    public function getPOccupationNameId()
    {
        return $this->p_occupation_name_id;
    }

    /**
     * @param mixed $p_occupation_name_id
     */
    public function setPOccupationNameId($p_occupation_name_id)
    {
        $this->p_occupation_name_id = $p_occupation_name_id;
    }

    /**
     * @return mixed
     */
    public function getOccupationName()
    {
        return $this->occupation_name;
    }

    /**
     * @param mixed $occupation_name
     */
    public function setOccupationName($occupation_name)
    {
        $this->occupation_name = $occupation_name;
    }
}