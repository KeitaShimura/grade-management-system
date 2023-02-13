<?php

class Students
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function index()
    {
        $statement = $this->PDO->prepare("SELECT * FROM students");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function save($data)
    {
        $statement = $this->PDO->prepare("INSERT INTO students (year, class, number, name, created_at, updated_at) VALUES(:year, :class, :number, :name, NOW(), NOW())");
        $statement->bindParam(":year", $data['year']);
        $statement->bindParam(":class", $data['class']);
        $statement->bindParam(":number", $data['number']);
        $statement->bindParam(":name", $data['name']);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $statement = $this->PDO->prepare("SELECT * FROM students where id = :id");
        $statement->bindParam(":id", $id);
        if ($statement->execute()) {
            return $statement->fetch();
        } else {
            return false;
        }
    }

    public function update($id,$data)
    {
        $statement = $this->PDO->prepare("UPDATE students SET year = :year, class = :class, number = :number, name = :name, updated_at=NOW() WHERE id = :id");
        $statement->bindParam(":year", $data['year']);
        $statement->bindParam(":class", $data['class']);
        $statement->bindParam(":number", $data['number']);
        $statement->bindParam(":name", $data['name']);
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return $statement->fetch();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $statement = $this->PDO->prepare("DELETE FROM students WHERE id = :id");
        $statement->bindParam(":id", $id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
