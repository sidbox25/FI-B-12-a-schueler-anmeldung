CREATE TABLE IF NOT EXISTS Students (
    id_students INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR (255),
    birth_date DATETIME,
    city_of_birth VARCHAR (255),
    country_of_birth VARCHAR (255),
    nationality VARCHAR (255),
    parents_language_of_birth VARCHAR (255),
    email VARCHAR (255),
    mobile_numbers VARCHAR (20),
    phone VARCHAR (20),
    consent_photos CHAR,
    lives_with VARCHAR (50),
    emergency_contact VARCHAR (50),
    emergency_contact_phone VARCHAR (20)
);