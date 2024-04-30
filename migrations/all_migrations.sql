-- create the database StudentRegistration --
CREATE DATABASE IF NOT EXISTS StudentRegistration;

-- init database bot user "schueler_anmeldung_user" --
CREATE USER IF NOT EXISTS 'schueler_anmeldung_user'@'localhost' IDENTIFIED BY 'Password123$';
GRANT ALL PRIVILEGES ON StudentRegistration.* TO 'schueler_anmeldung_user'@'localhost';
FLUSH PRIVILEGES;

USE StudentRegistration;

-- 1 --
CREATE TABLE IF NOT EXISTS StudentRegistration.addresses (
    p_address_id INT PRIMARY KEY AUTO_INCREMENT,
    address_details VARCHAR(255), -- street and house number
    zipcode VARCHAR(10), -- zipcode/plz
    city VARCHAR(255) -- city/stadt
    );



-- 2 --
CREATE TABLE IF NOT EXISTS StudentRegistration.admins (
    p_admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20),
    password VARCHAR(20),
    admin_level INT
    );


-- 3 --
CREATE TABLE IF NOT EXISTS StudentRegistration.completed_courses (
    p_course_id INT,
    course_name VARCHAR(255),
    PRIMARY KEY(p_course_id)
    );


-- 4 --
/* todo: könnte sein, die Tabelle ist ein Duplikat einer anderen Tabelle
CREATE TABLE IF NOT EXISTS StudentRegistration.chosen_options (
          p_chosen_option_id INT PRIMARY KEY AUTO_INCREMENT,
          chosen_option INT(1) -- chosen option/1. Wahl oder 2. Wahl
    );
*/


-- 5 --
CREATE TABLE IF NOT EXISTS contracts (
     p_id_contract INT PRIMARY KEY AUTO_INCREMENT,
     file BLOB
);



-- 6 --
CREATE TABLE IF NOT EXISTS student_options (
    p_option_id INT,
    option_name VARCHAR(255),
    PRIMARY KEY(p_option_id)
    );


-- 7 --
CREATE TABLE IF NOT EXISTS genders (
        p_gender_id INT PRIMARY KEY AUTO_INCREMENT,
        gender CHAR,
        salutation VARCHAR (5)
    );

-- 8 --
CREATE TABLE IF NOT EXISTS StudentRegistration.occupation_names (
             p_occupation_name_id INT PRIMARY KEY AUTO_INCREMENT,
             occupation_name VARCHAR(255) -- occupation name/Berufsname
    );

-- 9 --
CREATE TABLE IF NOT EXISTS school_graduations (
    p_graduation_id INT,
    graduation_name VARCHAR(255),
    PRIMARY KEY(p_graduation_id)
    );

-- 10 --
CREATE TABLE IF NOT EXISTS StudentRegistration.apprenticeships (
    p_apprenticeship_id INT PRIMARY KEY AUTO_INCREMENT,
    company_name VARCHAR(255), -- company name/Name des Betriebs
    contact_person VARCHAR(255), -- contact person/Ansprechpartner
    company_phone_number VARCHAR(20), -- phone number/telefonnummer
    company_fax VARCHAR(20), -- fax
    company_mail VARCHAR(30), -- mail/E-Mail
    fk_id_contract INT,
    fk_occupation_name_id INT,
    FOREIGN KEY (fk_id_contract) REFERENCES contracts(p_id_contract),
    FOREIGN KEY (fk_occupation_name_id) REFERENCES occupation_names(p_occupation_name_id)
    );

-- 11 --
CREATE TABLE IF NOT EXISTS students (
    p_student_id INT PRIMARY KEY AUTO_INCREMENT,
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
    emergency_contact_phone VARCHAR (20),
    fk_apprenticeship_id INT,
    FOREIGN KEY (fk_apprenticeship_id) REFERENCES apprenticeships(p_apprenticeship_id)
    );

-- 12 --
CREATE TABLE IF NOT EXISTS StudentRegistration.school_day_options (
    p_school_day_options_id INT PRIMARY KEY AUTO_INCREMENT,
    school_day_option INT(1), -- school day option/Schultwagewunsch 1. oder 2. Wahl
    school_year INT(4), -- school year/Jahrgang
    school_semester INT(1) -- school semester/Halbjahr
    );


-- 13 --
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

-- 14 --
CREATE TABLE IF NOT EXISTS school_visit(
     pf_students_id INT,
     last_visited_school VARCHAR(255),
    last_finished_apprenticeship VARCHAR(255),
    graduation_year INT NOT NULL,
    f_option_id INT,
    f_graduation_id INT,
    f_course_id INT,
    fk_school_day_options_id INT,
    PRIMARY KEY(pf_students_id),
    FOREIGN KEY(pf_students_id) REFERENCES students(p_student_id),
    FOREIGN KEY(f_option_id) REFERENCES student_options(p_option_id),
    FOREIGN KEY(f_graduation_id) REFERENCES school_graduations(p_graduation_id),
    FOREIGN KEY(f_course_id) REFERENCES completed_courses(p_course_id),
    FOREIGN KEY(fk_school_day_options_id) REFERENCES school_day_options(p_school_day_options_id)
    )