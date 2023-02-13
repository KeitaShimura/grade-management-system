<?php

require_once "../../config/db.php";
require_once "../../model/Tests.php";
require_once "../../controller/TestsController.php";

$obj = new TestsController();
$obj->delete($_GET['id']);
