<?php
require_once "../../config/db.php";
require_once "../../model/Exams.php";
require_once "../../controller/ExamsController.php";

$token = filter_input(INPUT_POST, 'token');
if (empty($_SESSION['token']) || $token !== $_SESSION['token']) {
    die('投稿失敗');
} else {
    $obj = new ExamsController();
    $obj->save();
}