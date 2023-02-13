<?php
require_once "../../config/db.php";
require_once "../../model/Students.php";
require_once "../../controller/StudentsController.php";
$obj = new StudentsController();
$students = $obj->index();

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
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">生徒一覧画面</h1>
    <div style="text-align: center;" class="position-relative">
        <?php if (isset($_SESSION['status'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['status'];
                unset($_SESSION['status']); ?>
            </div>

        <?php endif; ?>
        <article>
            <div class="table-responsive">
                <?php if ($students) : ?>
                    <table class="table" style="margin:30px auto; text-align: center; border-top: 1px solid lightgray; width:80%;">
                        <thead style="height: 50px;">
                            <tr>
                                <th class="col-3" style="font-weight: bold;">ID</th>
                                <th class="col-3" style="font-weight: bold;">学年</th>
                                <th class="col-3" style="font-weight: bold;">クラス</th>
                                <th class="col-3" style="font-weight: bold;">学生番号</th>
                                <th class="col-3" style="font-weight: bold;">名前</th>
                                <th class="col-3" style="font-weight: bold;">編集</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($student['id']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($student['year']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($student['class']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($student['number']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($student['name']); ?></td>
                                    <td class="col-3" style="vertical-align: middle;"><a href="edit.php?id=<?php print($student['id']); ?>" class="btn btn-primary">編集</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                <?php else : ?>
                    <h3 class="fs-3" style="text-align: center; margin: 50px 0 0 0;">生徒は登録されていません</h3>
                <?php endif; ?>
            </div>
        </article>
    </div>
</body>

</html>