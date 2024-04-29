<?php

class SchoolDayOption extends BaseEntity
{
    protected $conn;
    protected $table = 'school_day_options';

    private $p_school_day_options_id;
    private $school_day_option;
    private $school_year;
    private $school_semester;

    public function __construct($db)
    {
        parent::__construct($db);
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

    /**
     * @return mixed
     */
    public function getPSchoolDayOptionsId()
    {
        return $this->p_school_day_options_id;
    }

    /**
     * @param mixed $p_school_day_options_id
     */
    public function setPSchoolDayOptionsId($p_school_day_options_id)
    {
        $this->p_school_day_options_id = $p_school_day_options_id;
    }

    /**
     * @return mixed
     */
    public function getSchoolDayOption()
    {
        return $this->school_day_option;
    }

    /**
     * @param mixed $school_day_option
     */
    public function setSchoolDayOption($school_day_option)
    {
        $this->school_day_option = $school_day_option;
    }

    /**
     * @return mixed
     */
    public function getSchoolYear()
    {
        return $this->school_year;
    }

    /**
     * @param mixed $school_year
     */
    public function setSchoolYear($school_year)
    {
        $this->school_year = $school_year;
    }

    /**
     * @return mixed
     */
    public function getSchoolSemester()
    {
        return $this->school_semester;
    }

    /**
     * @param mixed $school_semester
     */
    public function setSchoolSemester($school_semester)
    {
        $this->school_semester = $school_semester;
    }

}