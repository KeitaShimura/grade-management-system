CREATE TABLE IF NOT EXISTS grade.exams (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    test_id INT(11) NOT NULL,
    student_id INT(11) NOT NULL,
    kokugo INT(11) NOT NULL,
    sugaku INT(11) NOT NULL,
    eigo INT(11) NOT NULL,
    rika INT(11) NOT NULL,
    shakai INT(11) NOT NULL,
    goukei INT(11) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME
);