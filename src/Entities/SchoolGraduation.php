<?php

class SchoolGraduation extends BaseEntity
{
    protected $conn;
    protected $table = 'school_graduations';

    private $p_graduation_id;
    private $graduation_name;

    public function __construct($db)
    {
        parent::__construct($db);
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

    /**
     * @return mixed
     */
    public function getPGraduationId()
    {
        return $this->p_graduation_id;
    }

    /**
     * @param mixed $p_graduation_id
     */
    public function setPGraduationId($p_graduation_id)
    {
        $this->p_graduation_id = $p_graduation_id;
    }

    /**
     * @return mixed
     */
    public function getGraduationName()
    {
        return $this->graduation_name;
    }

    /**
     * @param mixed $graduation_name
     */
    public function setGraduationName($graduation_name)
    {
        $this->graduation_name = $graduation_name;
    }
}