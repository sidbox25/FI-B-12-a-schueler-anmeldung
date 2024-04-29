<?php

class ChosenOption extends BaseEntity {
    protected $conn;
    protected $table = 'chosen_options';

    public $p_chosen_option_id;
    public $chosen_option;

    public function __construct($db) {
        $this->conn = $db;
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
}