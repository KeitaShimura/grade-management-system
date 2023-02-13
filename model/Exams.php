<?php

class Exams
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function save($data)
    {
        $statement = $this->PDO->prepare("INSERT INTO exams (test_id, student_id, kokugo, sugaku, eigo, rika, shakai, goukei, created_at, updated_at) VALUES(:test_id, :student_id, :kokugo, :sugaku, :eigo, :rika, :shakai, :goukei, NOW(), NOW())");
        $statement->bindParam(":test_id", $data['test_id']);
        $statement->bindParam(":student_id", $data['student_id']);
        $statement->bindParam(":kokugo", $data['kokugo']);
        $statement->bindParam(":sugaku", $data['sugaku']);
        $statement->bindParam(":eigo", $data['eigo']);
        $statement->bindParam(":rika", $data['rika']);
        $statement->bindParam(":shakai", $data['shakai']);
        $statement->bindParam(":goukei", $data['goukei']);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}