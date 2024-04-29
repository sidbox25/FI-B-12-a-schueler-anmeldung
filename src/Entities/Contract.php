<?php

class Contract extends BaseEntity {
    protected $conn;
    protected $table = 'contracts';

    public $p_id_contract;
    public $file;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET file = :file";

        $stmt = $this->conn->prepare($query);

        // Assuming $this->file contains the file content
        $stmt->bindParam(':file', $this->file, PDO::PARAM_LOB);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
