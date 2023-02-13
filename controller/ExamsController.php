<?php

class ExamsController
{

    private $model;
    public function __construct()
    {
        $this->model = new Exams();
    }

    public function save()
    {
        $test_id = htmlspecialchars(trim($_POST['test_id']), ENT_QUOTES);
        $student_id = htmlspecialchars(trim($_POST['student_id']), ENT_QUOTES);
        $kokugo = htmlspecialchars(trim($_POST['kokugo']), ENT_QUOTES);
        $sugaku = htmlspecialchars(trim($_POST['sugaku']), ENT_QUOTES);
        $eigo = htmlspecialchars(trim($_POST['eigo']), ENT_QUOTES);
        $rika = htmlspecialchars(trim($_POST['rika']), ENT_QUOTES);
        $shakai = htmlspecialchars(trim($_POST['shakai']), ENT_QUOTES);
        $goukei = htmlspecialchars(trim($_POST['goukei']), ENT_QUOTES);

        $data = [
            'test_id' => trim($test_id),
            'student_id' => trim($student_id),
            'kokugo' => trim($kokugo),
            'sugaku' => trim($sugaku),
            'eigo' => trim($eigo),
            'rika' => trim($rika),
            'shakai' => trim($shakai),
            'goukei' => trim($goukei),
        ];

        if ($_POST['test_id'] == "テスト") {
            $_SESSION['status'] = "テストを選択してください。";
            return header("Location: create.php");
        } else if ($_POST['student_id'] == "生徒") {
            $_SESSION['status'] = "生徒を洗濯してください。";
            return header("Location: create.php");
        } else if (empty($_POST['kokugo'])) {
            $_SESSION['status'] = "国語の点数を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['sugaku'])) {
            $_SESSION['status'] = "数学の点数を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['eigo'])) {
            $_SESSION['status'] = "英語の点数を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['rika'])) {
            $_SESSION['status'] = "理科の点数を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['shakai'])) {
            $_SESSION['status'] = "社会の点数を入力してください。";
            return header("Location: create.php");
        } else if (empty($_POST['goukei'])) {
            $_SESSION['status'] = "合計の点数を入力してください。";
            return header("Location: create.php");
        }

        $this->model->save($data);
        $_SESSION['status'] = "テスト結果を登録しました。";
        return header("Location: index.php");
    }
}
