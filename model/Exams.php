<?php

class Exams
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function create()
    {
        $statement = $this->PDO->prepare("SELECT * FROM exams WHERE");
        $statement->execute();

        return $statement->fetchAll();
    }
}