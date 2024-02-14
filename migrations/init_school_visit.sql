CREATE TABLE IF NOT EXISTS school_visit(
    pf_id_students INT,
    last_visited_school VARCHAR(255),
    last_finished_apprenticeship VARCHAR(255),
    graduation_year INT NOT NULL,
    f_option_id INT,
    f_graduation_id INT,
    f_course_id INT,
    PRIMARY KEY(pf_id_students), 
    FOREIGN KEY(pf_id_students) REFERENCES Students(id_students),
    FOREIGN KEY(f_option_id) REFERENCES student_option(p_option_id),
    FOREIGN KEY(f_graduation_id) REFERENCES school_graduation(p_graduation_id),
    FOREIGN KEY(f_course_id) REFERENCES completed_course(p_course_id)
)