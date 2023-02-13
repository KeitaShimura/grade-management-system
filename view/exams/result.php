<?php
require_once "../../config/db.php";
require_once "../../model/Exams.php";
require_once "../../controller/ExamsController.php";
$obj = new ExamsController();
$exams = $obj->index();

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
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">テスト一覧画面</h1>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="edit.php?id=<?php print($test['id']); ?>">前期中間テスト</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="edit.php?id=<?php print($test['id']); ?>">前期期末テスト</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="edit.php?id=<?php print($test['id']); ?>">後期中間テスト</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="edit.php?id=<?php print($test['id']); ?>">後期期末テスト</a>
        </li>
    </ul>
</body>

</html>