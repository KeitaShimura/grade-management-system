<?php

class Tests
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM grade ORDER BY id");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function create() {

    }

    public function save($data)
    {
        $statement = $this->PDO->prepare("INSERT INTO bookings (year, name, created_at, updated_at) VALUES(:year, :name, NOW(), NOW())");
        $statement->bindParam(":year", $data['year']);
        $statement->bindParam(":name", $data['name']);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit() {

    }

    public function update($id, $content)
    {
        $statement = $this->PDO->prepare("UPDATE grade SET year = :year, name = :name, updated_at=NOW() WHERE id = :id");
        $statement->bindParam(":year", $year);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return $statement->fetch();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $statement = $this->PDO->prepare("DELETE FROM grade WHERE id = :id");
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
