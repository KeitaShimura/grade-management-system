<?php
require_once "../../config/db.php";
require_once "../../model/Tests.php";
require_once "../../model/Students.php";
require_once "../../controller/TestsController.php";
require_once "../../controller/StudentsController.php";

$tests_obj = new TestsController();
$students_obj = new StudentsController();
$tests = $tests_obj->index();
$students = $students_obj->index();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">生徒登録画面</h1>
    <select>
    <?php foreach ($tests as $test) : ?>
    <option value=""><?php print($test['year']); ?>年/ <?php print($test['name']); ?></option>
    <?php endforeach; ?>
    </select>
    <select>
    <?php foreach ($students as $student) : ?>
    <option value=""><?php print($student['year']); ?>年/ <?php print($student['class']); ?>組/ <?php print($student['number']); ?>番/ <?php print($student['name']); ?></option>
    <?php endforeach; ?>
    </select>
</body>
</html>