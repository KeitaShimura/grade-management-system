<?php
require_once "../../config/db.php";
require_once "../../model/Tests.php";
require_once "../../controller/TestsController.php";
$obj = new TestsController();
$test = $obj->edit($_GET['id']);

session_start();

$token = bin2hex(openssl_random_pseudo_bytes(24));
$_SESSION['token'] = $token;
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
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">テスト登録画面</h1>
    <div style="text-align: center;" class="position-relative">
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?php print($test[0]); ?>">
            <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_COMPAT, 'UTF-8'); ?>">

            <?php if (isset($_SESSION['status'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['status'];
                    unset($_SESSION['status']); ?>
                </div>

            <?php endif; ?>
            <div class="form" style="text-align: center;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">学年</label>
                    <input type="number" min="1" max="10" class="form-control" id="year" name="year" value="<?php print($test[1]); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">お名前</label>
                    <input type="text" class="form-control" name="name" value="<?php print($test[2]); ?>">
                </div>
                <div style="text-align: center;">
                    <input type="hidden" name="id" value="<?php print($test[0]); ?>">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_COMPAT, 'UTF-8'); ?>">
                    <input type="submit" class="btn btn-success" value="送信">
                    <input type="reset" class="btn btn-secondary" value="リセット">
                </div>
            </div>
        </form>
        <form method="POST" action="delete.php?id=<?php print($test['id']); ?>">
            <input type="submit" class="btn btn-danger" value="削除">
        </form>
    </div>
</body>

</html>