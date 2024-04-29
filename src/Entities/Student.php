<?php

class Student extends BaseEntity
{
    protected $conn;
    protected $table = 'students';

    private $p_student_id;
    private $first_name;
    private $last_name;
    private $birth_date;
    private $city_of_birth;
    private $country_of_birth;
    private $nationality;
    private $parents_language_of_birth;
    private $email;
    private $mobile_numbers;
    private $phone;
    private $consent_photos;
    private $lives_with;
    private $emergency_contact;
    private $emergency_contact_phone;
    private $fk_apprenticeship_id;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET first_name = :first_name, 
                      last_name = :last_name, 
                      birth_date = :birth_date, 
                      city_of_birth = :city_of_birth, 
                      country_of_birth = :country_of_birth, 
                      nationality = :nationality, 
                      parents_language_of_birth = :parents_language_of_birth, 
                      email = :email, 
                      mobile_numbers = :mobile_numbers, 
                      phone = :phone, 
                      consent_photos = :consent_photos, 
                      lives_with = :lives_with, 
                      emergency_contact = :emergency_contact, 
                      emergency_contact_phone = :emergency_contact_phone, 
                      fk_apprenticeship_id = :fk_apprenticeship_id";

        $stmt = $this->conn->prepare($query);

        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->birth_date = htmlspecialchars(strip_tags($this->birth_date));
        $this->city_of_birth = htmlspecialchars(strip_tags($this->city_of_birth));
        $this->country_of_birth = htmlspecialchars(strip_tags($this->country_of_birth));
        $this->nationality = htmlspecialchars(strip_tags($this->nationality));
        $this->parents_language_of_birth = htmlspecialchars(strip_tags($this->parents_language_of_birth));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->mobile_numbers = htmlspecialchars(strip_tags($this->mobile_numbers));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->consent_photos = htmlspecialchars(strip_tags($this->consent_photos));
        $this->lives_with = htmlspecialchars(strip_tags($this->lives_with));
        $this->emergency_contact = htmlspecialchars(strip_tags($this->emergency_contact));
        $this->emergency_contact_phone = htmlspecialchars(strip_tags($this->emergency_contact_phone));
        $this->fk_apprenticeship_id = htmlspecialchars(strip_tags($this->fk_apprenticeship_id));

        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':birth_date', $this->birth_date);
        $stmt->bindParam(':city_of_birth', $this->city_of_birth);
        $stmt->bindParam(':country_of_birth', $this->country_of_birth);
        $stmt->bindParam(':nationality', $this->nationality);
        $stmt->bindParam(':parents_language_of_birth', $this->parents_language_of_birth);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mobile_numbers', $this->mobile_numbers);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':consent_photos', $this->consent_photos);
        $stmt->bindParam(':lives_with', $this->lives_with);
        $stmt->bindParam(':emergency_contact', $this->emergency_contact);
        $stmt->bindParam(':emergency_contact_phone', $this->emergency_contact_phone);
        $stmt->bindParam(':fk_apprenticeship_id', $this->fk_apprenticeship_id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPStudentId()
    {
        return $this->p_student_id;
    }

    /**
     * @param mixed $p_student_id
     */
    public function setPStudentId($p_student_id)
    {
        $this->p_student_id = $p_student_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param mixed $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return mixed
     */
    public function getCityOfBirth()
    {
        return $this->city_of_birth;
    }

    /**
     * @param mixed $city_of_birth
     */
    public function setCityOfBirth($city_of_birth)
    {
        $this->city_of_birth = $city_of_birth;
    }

    /**
     * @return mixed
     */
    public function getCountryOfBirth()
    {
        return $this->country_of_birth;
    }

    /**
     * @param mixed $country_of_birth
     */
    public function setCountryOfBirth($country_of_birth)
    {
        $this->country_of_birth = $country_of_birth;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getParentsLanguageOfBirth()
    {
        return $this->parents_language_of_birth;
    }

    /**
     * @param mixed $parents_language_of_birth
     */
    public function setParentsLanguageOfBirth($parents_language_of_birth)
    {
        $this->parents_language_of_birth = $parents_language_of_birth;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMobileNumbers()
    {
        return $this->mobile_numbers;
    }

    /**
     * @param mixed $mobile_numbers
     */
    public function setMobileNumbers($mobile_numbers)
    {
        $this->mobile_numbers = $mobile_numbers;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getConsentPhotos()
    {
        return $this->consent_photos;
    }

    /**
     * @param mixed $consent_photos
     */
    public function setConsentPhotos($consent_photos)
    {
        $this->consent_photos = $consent_photos;
    }

    /**
     * @return mixed
     */
    public function getLivesWith()
    {
        return $this->lives_with;
    }

    /**
     * @param mixed $lives_with
     */
    public function setLivesWith($lives_with)
    {
        $this->lives_with = $lives_with;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContact()
    {
        return $this->emergency_contact;
    }

    /**
     * @param mixed $emergency_contact
     */
    public function setEmergencyContact($emergency_contact)
    {
        $this->emergency_contact = $emergency_contact;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactPhone()
    {
        return $this->emergency_contact_phone;
    }

    /**
     * @param mixed $emergency_contact_phone
     */
    public function setEmergencyContactPhone($emergency_contact_phone)
    {
        $this->emergency_contact_phone = $emergency_contact_phone;
    }

    /**
     * @return mixed
     */
    public function getFkApprenticeshipId()
    {
        return $this->fk_apprenticeship_id;
    }

    /**
     * @param mixed $fk_apprenticeship_id
     */
    public function setFkApprenticeshipId($fk_apprenticeship_id)
    {
        $this->fk_apprenticeship_id = $fk_apprenticeship_id;
    }
}