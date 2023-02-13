<?php
require_once "../../config/db.php";
require_once "../../model/Tests.php";
require_once "../../controller/TestsController.php";


$token = filter_input(INPUT_POST, 'token');
if (empty($_SESSION['token']) || $token !== $_SESSION['token']) {
    die('投稿失敗');
} else {
    $obj = new TestsController();
    $obj->save();
}