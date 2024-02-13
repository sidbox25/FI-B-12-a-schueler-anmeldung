CREATE IF NOT EXISTS TABLE StudentRegistration.address (
    id_address INT PRIMARY KEY AUTO_INCREMENT, 
    address_details VARCHAR(255), --street and house number
    zipcode VARCHAR(10), -- zipcode/plz
    city VARCHAR(255) -- city/stadt
);