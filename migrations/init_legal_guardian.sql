CREATE IF NOT EXISTS TABLE StudentRegistration.legal_guardian (
     parent_id INT PRIMARY KEY AUTO_INCREMENT,
     student_id INT,
     gender_id INT,
     lastname VARCHAR(50),
     firstname VARCHAR(50),
     telefonenumber VARCHAR(20),
     address_id INT,
     FOREIGN KEY (student_id) REFERENCES student(student_id),
     FOREIGN KEY (gender_id) REFERENCES gender(gender_id),
     FOREIGN KEY (address_id) REFERENCES address(address_id)
);