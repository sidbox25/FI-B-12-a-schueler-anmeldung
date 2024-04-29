<?php

class StudentOption extends BaseEntity
{
    protected $conn;
    protected $table = 'student_options';

    private $p_option_id;
    private $option_name;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET option_name = :option_name";

        $stmt = $this->conn->prepare($query);

        $this->option_name = htmlspecialchars(strip_tags($this->option_name));

        $stmt->bindParam(':option_name', $this->option_name);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPOptionId()
    {
        return $this->p_option_id;
    }

    /**
     * @param mixed $p_option_id
     */
    public function setPOptionId($p_option_id)
    {
        $this->p_option_id = $p_option_id;
    }

    /**
     * @return mixed
     */
    public function getOptionName()
    {
        return $this->option_name;
    }

    /**
     * @param mixed $option_name
     */
    public function setOptionName($option_name)
    {
        $this->option_name = $option_name;
    }
}