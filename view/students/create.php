<?PHP
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
    <h1 class="fs-1" style="margin: 50px 0 0 40px;">生徒登録画面</h1>
    <div style="text-align: center;" class="position-relative">
        <form method="POST" action="save.php">
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
                    <input type="number" min="1" max="10" class="form-control" id="year" name="year">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">クラス</label>
                    <input type="number" min="1" max="10" class="form-control" id="class" name="class">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">学生番号</label>
                    <input type="number" min="1" max="100" class="form-control" id="number" name="number">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">お名前</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-success" value="送信">
                    <input type="reset" class="btn btn-danger" value="リセット">
                </div>
        </form>
    </div>
</body>

</html>