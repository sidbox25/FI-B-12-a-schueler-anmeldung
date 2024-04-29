<?php

class SchoolDayOption extends BaseEntity
{
    protected $conn;
    protected $table = 'school_day_options';

    public $p_school_day_options_id;
    public $school_day_option;
    public $school_year;
    public $school_semester;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET school_day_option = :school_day_option, 
                      school_year = :school_year, 
                      school_semester = :school_semester";

        $stmt = $this->conn->prepare($query);

        $this->school_day_option = htmlspecialchars(strip_tags($this->school_day_option));
        $this->school_year = htmlspecialchars(strip_tags($this->school_year));
        $this->school_semester = htmlspecialchars(strip_tags($this->school_semester));

        $stmt->bindParam(':school_day_option', $this->school_day_option);
        $stmt->bindParam(':school_year', $this->school_year);
        $stmt->bindParam(':school_semester', $this->school_semester);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}