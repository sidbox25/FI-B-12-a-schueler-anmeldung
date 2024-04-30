<?php

class Contract extends BaseEntity {
    protected $conn;
    protected $table = 'contracts';

    private $p_id_contract;
    private $file;

    public function __construct($db) {
        parent::__construct($db);
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

    /**
     * @return mixed
     */
    public function getPIdContract()
    {
        return $this->p_id_contract;
    }

    /**
     * @param mixed $p_id_contract
     */
    public function setPIdContract($p_id_contract)
    {
        $this->p_id_contract = $p_id_contract;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


}
