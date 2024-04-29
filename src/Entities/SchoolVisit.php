<?php

class SchoolVisit extends BaseEntity
{
    protected $conn;
    protected $table = 'school_visit';

    private $pf_students_id;
    private $last_visited_school;
    private $last_finished_apprenticeship;
    private $graduation_year;
    private $f_option_id;
    private $f_graduation_id;
    private $f_course_id;
    private $fk_school_day_options_id;

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function create()
    {
        $query = "INSERT INTO $this->table
                  SET last_visited_school = :last_visited_school, 
                      last_finished_apprenticeship = :last_finished_apprenticeship, 
                      graduation_year = :graduation_year, 
                      f_option_id = :f_option_id, 
                      f_graduation_id = :f_graduation_id, 
                      f_course_id = :f_course_id, 
                      fk_school_day_options_id = :fk_school_day_options_id";

        $stmt = $this->conn->prepare($query);

        $this->last_visited_school = htmlspecialchars(strip_tags($this->last_visited_school));
        $this->last_finished_apprenticeship = htmlspecialchars(strip_tags($this->last_finished_apprenticeship));
        $this->graduation_year = htmlspecialchars(strip_tags($this->graduation_year));
        $this->f_option_id = htmlspecialchars(strip_tags($this->f_option_id));
        $this->f_graduation_id = htmlspecialchars(strip_tags($this->f_graduation_id));
        $this->f_course_id = htmlspecialchars(strip_tags($this->f_course_id));
        $this->fk_school_day_options_id = htmlspecialchars(strip_tags($this->fk_school_day_options_id));

        $stmt->bindParam(':last_visited_school', $this->last_visited_school);
        $stmt->bindParam(':last_finished_apprenticeship', $this->last_finished_apprenticeship);
        $stmt->bindParam(':graduation_year', $this->graduation_year);
        $stmt->bindParam(':f_option_id', $this->f_option_id);
        $stmt->bindParam(':f_graduation_id', $this->f_graduation_id);
        $stmt->bindParam(':f_course_id', $this->f_course_id);
        $stmt->bindParam(':fk_school_day_options_id', $this->fk_school_day_options_id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPfStudentsId()
    {
        return $this->pf_students_id;
    }

    /**
     * @param mixed $pf_students_id
     */
    public function setPfStudentsId($pf_students_id)
    {
        $this->pf_students_id = $pf_students_id;
    }

    /**
     * @return mixed
     */
    public function getLastVisitedSchool()
    {
        return $this->last_visited_school;
    }

    /**
     * @param mixed $last_visited_school
     */
    public function setLastVisitedSchool($last_visited_school)
    {
        $this->last_visited_school = $last_visited_school;
    }

    /**
     * @return mixed
     */
    public function getLastFinishedApprenticeship()
    {
        return $this->last_finished_apprenticeship;
    }

    /**
     * @param mixed $last_finished_apprenticeship
     */
    public function setLastFinishedApprenticeship($last_finished_apprenticeship)
    {
        $this->last_finished_apprenticeship = $last_finished_apprenticeship;
    }

    /**
     * @return mixed
     */
    public function getGraduationYear()
    {
        return $this->graduation_year;
    }

    /**
     * @param mixed $graduation_year
     */
    public function setGraduationYear($graduation_year)
    {
        $this->graduation_year = $graduation_year;
    }

    /**
     * @return mixed
     */
    public function getFOptionId()
    {
        return $this->f_option_id;
    }

    /**
     * @param mixed $f_option_id
     */
    public function setFOptionId($f_option_id)
    {
        $this->f_option_id = $f_option_id;
    }

    /**
     * @return mixed
     */
    public function getFGraduationId()
    {
        return $this->f_graduation_id;
    }

    /**
     * @param mixed $f_graduation_id
     */
    public function setFGraduationId($f_graduation_id)
    {
        $this->f_graduation_id = $f_graduation_id;
    }

    /**
     * @return mixed
     */
    public function getFCourseId()
    {
        return $this->f_course_id;
    }

    /**
     * @param mixed $f_course_id
     */
    public function setFCourseId($f_course_id)
    {
        $this->f_course_id = $f_course_id;
    }

    /**
     * @return mixed
     */
    public function getFkSchoolDayOptionsId()
    {
        return $this->fk_school_day_options_id;
    }

    /**
     * @param mixed $fk_school_day_options_id
     */
    public function setFkSchoolDayOptionsId($fk_school_day_options_id)
    {
        $this->fk_school_day_options_id = $fk_school_day_options_id;
    }
}