<?php

class Address extends BaseEntity
{

    protected $conn;
    protected $table = 'addresses';

    public $p_address_id;
    public $address_details;
    public $zipcode;
    public $city;

    public function __construct($db)
    {
        parent::__construct($db);
    }


    public function create(): bool
    {
        $query = "INSERT INTO $this->table
                  SET address_details = :address_details, 
                      zipcode = :zipcode, 
                      city = :city";

        $stmt = $this->conn->prepare($query);

        $this->address_details = htmlspecialchars(strip_tags($this->address_details));
        $this->zipcode = htmlspecialchars(strip_tags($this->zipcode));
        $this->city = htmlspecialchars(strip_tags($this->city));

        $stmt->bindParam(':address_details', $this->address_details);
        $stmt->bindParam(':zipcode', $this->zipcode);
        $stmt->bindParam(':city', $this->city);


        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }


    public function update()
    {
        // Implement update method
    }

    public function delete()
    {
        // Implement delete method
    }
}