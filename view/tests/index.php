<?php
require_once "../../config/db.php";
require_once "../../model/Tests.php";
require_once "../../controller/TestsController.php";
$obj = new TestsController();
$tests = $obj->index();

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
    <div style="text-align: center;" class="position-relative">
        <?php if (isset($_SESSION['status'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['status'];
                unset($_SESSION['status']); ?>
            </div>

        <?php endif; ?>
        <article>
            <div class="table-responsive">
                <?php if ($tests) : ?>
                    <table class="table" style="margin:30px auto; text-align: center; border-top: 1px solid lightgray; width:80%;">
                        <thead style="height: 50px;">
                            <tr>
                                <th class="col-3" style="font-weight: bold;">ID</th>
                                <th class="col-3" style="font-weight: bold;">学年</th>
                                <th class="col-3" style="font-weight: bold;">名前</th>
                                <th class="col-3" style="font-weight: bold;">編集</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tests as $test) : ?>
                                <tr>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($test['id']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($test['year']); ?></td>
                                    <td class="col-3" style="text-align: left; vertical-align: middle;"><?php print($test['name']); ?></td>
                                    <td class="col-3" style="vertical-align: middle;"><a href="edit.php?id=<?php print($test['id']); ?>" class="btn btn-primary">編集</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                <?php else : ?>
                    <h3 class="fs-3" style="text-align: center; margin: 50px 0 0 0;">TODOはありません</h3>
                <?php endif; ?>
            </div>
        </article>
    </div>
</body>

</html>