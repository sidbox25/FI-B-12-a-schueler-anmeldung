<?php

class SchoolVisit extends BaseEntity
{
    protected $conn;
    protected $table = 'school_visit';

    public $pf_students_id;
    public $last_visited_school;
    public $last_finished_apprenticeship;
    public $graduation_year;
    public $f_option_id;
    public $f_graduation_id;
    public $f_course_id;
    public $fk_school_day_options_id;

    public function __construct($db)
    {
        parent::__conctruct($db);
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
}