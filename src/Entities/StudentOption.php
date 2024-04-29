<?php

class StudentOption extends BaseEntity {
    protected $conn;
    protected $table = 'student_options';

    public $p_option_id;
    public $option_name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET option_name = :option_name";

        $stmt = $this->conn->prepare($query);

        $this->option_name = htmlspecialchars(strip_tags($this->option_name));

        $stmt->bindParam(':option_name', $this->option_name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}