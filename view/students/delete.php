<?php

require_once "../../config/db.php";
require_once "../../model/Students.php";
require_once "../../controller/StudentsController.php";

$obj = new StudentsController();
$obj->delete($_GET['id']);
