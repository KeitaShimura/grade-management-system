<?php
require_once "../../config/db.php";
require_once "../../model/Students.php";
require_once "../../controller/StudentsController.php";

$token = filter_input(INPUT_POST, 'token');
if (empty($_SESSION['token']) || $token !== $_SESSION['token']) {
    die('投稿失敗');
} else {
    $obj = new StudentsController();
    $obj->update($_POST['id'], $_POST['data']);
}
