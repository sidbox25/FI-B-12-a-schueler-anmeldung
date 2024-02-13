CREATE IF NOT EXISTS TABLE StudentRegistration.schoolDayOptions (
    id_schoolDayOptions INT PRIMARY KEY AUTO_INCREMENT, 
    school_day_option INT(1), -- school day option/Schultwagewunsch 1. oder 2. Wahl
    school_year INT(4), -- school year/Jahrgang
    school_semester INT(1) -- school semester/Halbjahr
);