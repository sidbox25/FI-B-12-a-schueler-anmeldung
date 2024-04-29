<?php

class Student extends BaseEntity
{
    protected $conn;
    protected $table = 'students';

    public $p_student_id;
    public $first_name;
    public $last_name;
    public $birth_date;
    public $city_of_birth;
    public $country_of_birth;
    public $nationality;
    public $parents_language_of_birth;
    public $email;
    public $mobile_numbers;
    public $phone;
    public $consent_photos;
    public $lives_with;
    public $emergency_contact;
    public $emergency_contact_phone;
    public $fk_apprenticeship_id;

    public function __construct($db)
    {
        $this->conn = $db;
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

}