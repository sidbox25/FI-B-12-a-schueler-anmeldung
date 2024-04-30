<?php

class CompletedCourse extends BaseEntity {

    protected $conn;
    protected $table = 'completed_courses';

    private $p_course_id;
    private $course_name;

    public function __construct($db) {
        parent::__construct($db);
    }

    public function create() {
        $query = "INSERT INTO $this->table
                  SET course_name = :course_name";

        $stmt = $this->conn->prepare($query);

        $this->course_name = htmlspecialchars(strip_tags($this->course_name));

        $stmt->bindParam(':course_name', $this->course_name);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    /**
     * @return mixed
     */
    public function getPCourseId()
    {
        return $this->p_course_id;
    }

    /**
     * @param mixed $p_course_id
     */
    public function setPCourseId($p_course_id)
    {
        $this->p_course_id = $p_course_id;
    }

    /**
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->course_name;
    }

    /**
     * @param mixed $course_name
     */
    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }
}