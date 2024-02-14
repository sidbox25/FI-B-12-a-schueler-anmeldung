CREATE IF NOT EXISTS TABLE StudentRegistration.legal_guardian (
     admin_id INT PRIMARY KEY AUTO_INCREMENT,
     username VARCHAR(20),
     password VARCHAR(20),
     admin_level INT
);