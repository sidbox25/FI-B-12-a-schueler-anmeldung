CREATE TABLE IF NOT EXISTS school_visit(
    pf_students_id INT,
    last_visited_school VARCHAR(255),
    last_finished_apprenticeship VARCHAR(255),
    graduation_year INT NOT NULL,
    f_option_id INT,
    f_graduation_id INT,
    f_course_id INT,
    PRIMARY KEY(pf_students_id), 
    FOREIGN KEY(pf_students_id) REFERENCES students(p_student_id),
    FOREIGN KEY(f_option_id) REFERENCES student_options(p_option_id),
    FOREIGN KEY(f_graduation_id) REFERENCES school_graduations(p_graduation_id),
    FOREIGN KEY(f_course_id) REFERENCES completed_courses(p_course_id)
)