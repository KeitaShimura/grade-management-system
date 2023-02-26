<?php

class Exams
{
    private $PDO;
    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function index()
    {
        $statement = $this->PDO->prepare("SELECT exams.id, tests.name AS test_name, students.name AS student_name, exams.kokugo, exams.sugaku, exams.eigo, exams.rika, exams.shakai, exams.goukei FROM exams INNER JOIN students ON exams.student_id = students.id INNER JOIN tests ON exams.test_id = tests.id");
        $statement->execute();

        return $statement->fetchAll();
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

    // ここ
    public function get($name)
    {
        $statement = $this->PDO->prepare("SELECT students.number AS student_number, students.name AS student_name, exams.kokugo, exams.sugaku, exams.eigo, exams.rika, exams.shakai, exams.goukei FROM exams INNER JOIN students ON exams.student_id = students.id INNER JOIN tests ON exams.test_id = tests.id WHERE tests.name = '前期中間テスト'");
        // $statement->bindParam(":name", $name);
        // if ($statement->execute()) {
        //     return $statement->fetch();
        // } else {
        //     return false;
        // }
        $statement->execute();

        $exams = $statement->fetchAll();

        foreach($exams as $exam) {
            echo '<tr>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['student_number'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['student_name'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['kokugo'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['sugaku'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['eigo'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['rika'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['shakai'].'</td>
                <td class="col-3" style="text-align: left; vertical-align: middle;">'.$exam['goukei'].'</td>
            </tr>';
        }
    }
}