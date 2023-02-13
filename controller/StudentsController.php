<?php

class StudentsController
{

    private $model;
    public function __construct()
    {
        $this->model = new Students();
    }

    public function index()
    {
        return $this->model->index();
    }

    public function save()
    {
        $year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES);
        $class = htmlspecialchars(trim($_POST['class']), ENT_QUOTES);
        $number = htmlspecialchars(trim($_POST['number']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);

        $data = [
            'year' => trim($year),
            'class' => trim($class),
            'number' => trim($number),
            'name' => trim($name),
        ];

        if (empty($_POST['year'])) {
            $_SESSION['status'] = "学年を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['class'])) {
            $_SESSION['status'] = "クラスを入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['number'])) {
            $_SESSION['status'] = "学生番号を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['name'])) {
            $_SESSION['status'] = "名前を入力してください。";
            return header("Location: create.php");
        }
        $this->model->save($data);
        $_SESSION['status'] = "生徒を登録しました。";
        return header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->model->edit($id);
    }

    public function update($id)
    {
        $year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES);
        $class = htmlspecialchars(trim($_POST['class']), ENT_QUOTES);
        $number = htmlspecialchars(trim($_POST['number']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);

        $data = [
            'year' => trim($year),
            'class' => trim($class),
            'number' => trim($number),
            'name' => trim($name),
        ];

        if (empty($_POST['year'])) {
            $_SESSION['status'] = "学年を入力してください。";
            return header("Location: edit.php");
        } else if (empty($_POST['class'])) {
            $_SESSION['status'] = "クラスを入力してください。";
            return header("Location: edit.php");
        } else if (empty($_POST['number'])) {
            $_SESSION['status'] = "学生番号を入力してください。";
            return header("Location: edit.php");
        } else if (empty($_POST['name'])) {
            $_SESSION['status'] = "名前を入力してください。";
            return header("Location: edit.php");
        }

        $_SESSION['status'] = "生徒を更新しました。";
        $this->model->update($id, $data);
        return header("Location: index.php");
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return header("Location: index.php");
    }
}
