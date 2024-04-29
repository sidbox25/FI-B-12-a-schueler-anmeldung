<?php

class ChosenOption extends BaseEntity {
    protected $conn;
    protected $table = 'chosen_options';

    private $p_chosen_option_id;
    private $chosen_option;

    public function __construct($db) {
        parent::__construct($db);
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET chosen_option = :chosen_option";

        $stmt = $this->conn->prepare($query);

        $this->chosen_option = htmlspecialchars(strip_tags($this->chosen_option));

        $stmt->bindParam(':chosen_option', $this->chosen_option);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPChosenOptionId()
    {
        return $this->p_chosen_option_id;
    }

    /**
     * @param mixed $p_chosen_option_id
     */
    public function setPChosenOptionId($p_chosen_option_id)
    {
        $this->p_chosen_option_id = $p_chosen_option_id;
    }

    /**
     * @return mixed
     */
    public function getChosenOption()
    {
        return $this->chosen_option;
    }

    /**
     * @param mixed $chosen_option
     */
    public function setChosenOption($chosen_option)
    {
        $this->chosen_option = $chosen_option;
    }

}