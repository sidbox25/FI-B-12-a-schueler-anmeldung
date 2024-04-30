<?php

namespace src\StudentResidence\Business;

class StudentResidenceTransfer
{
    private $address_details;
    private $zipcode;
    private $city;
    private $emergency_contact;
    private $emergency_contact_phone;


    public function getAddressDetails()
    {
        return $this->address_details;
    }

    public function setAddressDetails($address_details)
    {
        $this->address_details = $address_details;
    }


    public function getZipcode()
    {
        return $this->zipcode;
    }

 
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }


    public function getCity()
    {
        return $this->city;
    }


    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getEmergencyContact()
    {
        return $this->emergency_contact;
    }

    // Setter für $emergency_contact
    public function setEmergencyContact($emergency_contact)
    {
        $this->emergency_contact = $emergency_contact;
    }

    public function getEmergencyContactPhone()
    {
        return $this->emergency_contact_phone;
    }

    public function setEmergencyContactPhone($emergency_contact_phone)
    {
        $this->emergency_contact_phone = $emergency_contact_phone;
    }
}

