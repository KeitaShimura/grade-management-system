<?php

class BookingController
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
            return header("Location: add.php");
        } else if (empty($_POST['name'])) {
            $_SESSION['status'] = "名前を入力してください。";
            return header("Location: add.php");
        }

        $_SESSION['status'] = "予約しました。";
        return header("Location: ../view/bookings.php");
    }

    public function edit($id)
    {
        return $this->model->edit($id);
    }

    public function update($id)
    {
        $year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES);
        $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES);

        $_SESSION['status'] = "テストを更新しました。";
        $this->model->update($id, $year, $name);
        return header("Location: ../index.php");
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }
}
