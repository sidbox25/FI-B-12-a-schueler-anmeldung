CREATE TABLE IF NOT EXISTS StudentRegistration.legal_guardians (
     p_parent_id INT PRIMARY KEY AUTO_INCREMENT,
     f_student_id INT,
     f_gender_id INT,
     f_address_id INT,
     lastname VARCHAR(50),
     firstname VARCHAR(50),
     telefon_number VARCHAR(20),
     FOREIGN KEY (f_student_id) REFERENCES students(p_student_id),
     FOREIGN KEY (f_gender_id) REFERENCES genders(p_gender_id),
     FOREIGN KEY (f_address_id) REFERENCES addresses(p_address_id)
);