<?php

class TestsController
{

    private $model;
    public function __construct()
    {
        $this->model = new Tests();
    }

    public function index()
    {
        return $this->model->index();
    }

    public function save()
    {
        $year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);

        $data = [
            'year' => trim($year),
            'name' => trim($name),
        ];

        if (empty($_POST['year'])) {
            $_SESSION['status'] = "学年を入力してください。";
            return header("Location: create.php");
        } else if ($_POST['name'] == "テストを選択") {
            $_SESSION['status'] = "テストを選択してください。";
            return header("Location: create.php");
        }
        $this->model->save($data);
        $_SESSION['status'] = "テストを登録しました。";
        return header("Location: index.php");
    }

    public function edit($id)
    {
        return $this->model->edit($id);
    }

    public function update($id)
    {
        $year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);

        $data = [
            'year' => trim($year),
            'name' => trim($name),
        ];

        if (empty($_POST['year'])) {
            $_SESSION['status'] = "学年を入力してください。";
            return header("Location: edit.php");
        } else if (empty($_POST['name'])) {
            $_SESSION['status'] = "名前を入力してください。";
            return header("Location: edit.php");
        }

        $_SESSION['status'] = "テストを更新しました。";
        $this->model->update($id, $data);
        return header("Location: index.php");
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return header("Location: index.php");
    }

    public function get()
    {
        return $this->model->get();
    }
}
