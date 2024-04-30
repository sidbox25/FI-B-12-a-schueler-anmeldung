<?php

class Address extends BaseEntity
{

    protected $conn;
    protected $table = 'addresses';

    private $p_address_id;
    private $address_details;
    private $zipcode;
    private $city;

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

    /**
     * @return mixed
     */
    public function getPAddressId()
    {
        return $this->p_address_id;
    }

    /**
     * @param mixed $p_address_id
     */
    public function setPAddressId($p_address_id)
    {
        $this->p_address_id = $p_address_id;
    }

    /**
     * @return mixed
     */
    public function getAddressDetails()
    {
        return $this->address_details;
    }

    /**
     * @param mixed $address_details
     */
    public function setAddressDetails($address_details)
    {
        $this->address_details = $address_details;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
}