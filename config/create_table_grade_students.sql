CREATE TABLE IF NOT EXISTS grade.students (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    year INT(11) NOT NULL,
    class INT(11) NOT NULL,
    number INT(11) NOT NULL,
    name VARCHAR(20) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME
);