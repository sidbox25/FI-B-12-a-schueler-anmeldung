<?php

class Apprenticeship extends BaseEntity {
    protected $conn;
    protected $table = 'apprenticeships';

    private $p_apprenticeship_id;
    private $company_name;
    private $contact_person;
    private $company_phone_number;
    private $company_fax;
    private $company_mail;
    private $fk_id_contract;
    private $fk_occupation_name_id;

    public function __construct($db) {
        parent::__construct($db);
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET company_name = :company_name, 
                      contact_person = :contact_person, 
                      company_phone_number = :company_phone_number, 
                      company_fax = :company_fax, 
                      company_mail = :company_mail, 
                      fk_id_contract = :fk_id_contract, 
                      fk_occupation_name_id = :fk_occupation_name_id";

        $stmt = $this->conn->prepare($query);

        $this->company_name = htmlspecialchars(strip_tags($this->company_name));
        $this->contact_person = htmlspecialchars(strip_tags($this->contact_person));
        $this->company_phone_number = htmlspecialchars(strip_tags($this->company_phone_number));
        $this->company_fax = htmlspecialchars(strip_tags($this->company_fax));
        $this->company_mail = htmlspecialchars(strip_tags($this->company_mail));
        $this->fk_id_contract = htmlspecialchars(strip_tags($this->fk_id_contract));
        $this->fk_occupation_name_id = htmlspecialchars(strip_tags($this->fk_occupation_name_id));

        $stmt->bindParam(':company_name', $this->company_name);
        $stmt->bindParam(':contact_person', $this->contact_person);
        $stmt->bindParam(':company_phone_number', $this->company_phone_number);
        $stmt->bindParam(':company_fax', $this->company_fax);
        $stmt->bindParam(':company_mail', $this->company_mail);
        $stmt->bindParam(':fk_id_contract', $this->fk_id_contract);
        $stmt->bindParam(':fk_occupation_name_id', $this->fk_occupation_name_id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPApprenticeshipId()
    {
        return $this->p_apprenticeship_id;
    }

    /**
     * @param mixed $p_apprenticeship_id
     */
    public function setPApprenticeshipId($p_apprenticeship_id)
    {
        $this->p_apprenticeship_id = $p_apprenticeship_id;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return mixed
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * @param mixed $contact_person
     */
    public function setContactPerson($contact_person)
    {
        $this->contact_person = $contact_person;
    }

    /**
     * @return mixed
     */
    public function getCompanyPhoneNumber()
    {
        return $this->company_phone_number;
    }

    /**
     * @param mixed $company_phone_number
     */
    public function setCompanyPhoneNumber($company_phone_number)
    {
        $this->company_phone_number = $company_phone_number;
    }

    /**
     * @return mixed
     */
    public function getCompanyFax()
    {
        return $this->company_fax;
    }

    /**
     * @param mixed $company_fax
     */
    public function setCompanyFax($company_fax)
    {
        $this->company_fax = $company_fax;
    }

    /**
     * @return mixed
     */
    public function getCompanyMail()
    {
        return $this->company_mail;
    }

    /**
     * @param mixed $company_mail
     */
    public function setCompanyMail($company_mail)
    {
        $this->company_mail = $company_mail;
    }

    /**
     * @return mixed
     */
    public function getFkIdContract()
    {
        return $this->fk_id_contract;
    }

    /**
     * @param mixed $fk_id_contract
     */
    public function setFkIdContract($fk_id_contract)
    {
        $this->fk_id_contract = $fk_id_contract;
    }

    /**
     * @return mixed
     */
    public function getFkOccupationNameId()
    {
        return $this->fk_occupation_name_id;
    }

    /**
     * @param mixed $fk_occupation_name_id
     */
    public function setFkOccupationNameId($fk_occupation_name_id)
    {
        $this->fk_occupation_name_id = $fk_occupation_name_id;
    }
}