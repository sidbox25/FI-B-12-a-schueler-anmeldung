CREATE IF NOT EXISTS TABLE StudentRegistration.apprenticeship (
    id_apprenticeship INT PRIMARY KEY AUTO_INCREMENT, 
    company_name VARCHAR(255), -- company name/Name des Betriebs
    contact_person VARCHAR(255), -- contact person/Ansprechpartner
    company_phone_number VARCHAR(20) -- phone number/telefonnummer
    company_fax VARCHAR(20) -- fax
    company_mail VARCHAR(30) -- mail/E-Mail
);