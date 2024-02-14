CREATE TABLE IF NOT EXISTS StudentRegistration.addresses (
    p_address_id INT PRIMARY KEY AUTO_INCREMENT,
    address_details VARCHAR(255), -- street and house number
    zipcode VARCHAR(10), -- zipcode/plz
    city VARCHAR(255) -- city/stadt
);

