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
            <select name="test_id">
            <option hidden>テスト</option>
                <?php foreach ($tests as $test) : ?>
                    <option><?php print($test['id']); ?></option>
                <?php endforeach; ?>
            </select>
            <select name="student_id">
            <option hidden>生徒</option>
                <?php foreach ($students as $student) : ?>
                    <option><?php print($student['id']); ?></option>
                <?php endforeach; ?>
            </select>
            <div class="form" style="text-align: center;">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">国語</label>
                    <input type="number" min="0" max="100" class="form-control" id="kokugo" name="kokugo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">数学</label>
                    <input type="number" min="0" max="100" class="form-control" id="sugaku" name="sugaku">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">英語</label>
                    <input type="number" min="0" max="100" class="form-control" id="eigo" name="eigo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">理科</label>
                    <input type="number" min="0" max="100" class="form-control" id="rika" name="rika">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">社会</label>
                    <input type="number" min="0" max="100" class="form-control" id="shakai" name="shakai">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">合計</label>
                    <input readonly type="number" min="0" max="100" class="form-control" id="goukei" name="goukei">
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-success" value="送信">
                    <input type="reset" class="btn btn-danger" value="リセット">
                </div>
            </div>
        </form>
    </div>
</body>

<script type="text/javascript">
    let kokugo, sugaku, eigo, rika, shakai, goukei;

    function calculation() {
        let kokugo_value = Number(kokugo.value);
        let sugaku_value = Number(sugaku.value);
        let eigo_value = Number(eigo.value);
        let rika_value = Number(rika.value);
        let shakai_value = Number(shakai.value);

        let sum = kokugo_value + sugaku_value + eigo_value + rika_value + shakai_value;
        if (isNaN(sum)) sum = "計算できません";
        goukei.value = sum;
    }

    window.addEventListener("load", () => {
        kokugo = document.getElementById("kokugo");
        sugaku = document.getElementById("sugaku");
        eigo = document.getElementById("eigo");
        rika = document.getElementById("rika");
        shakai = document.getElementById("shakai");
        goukei = document.getElementById("goukei");

        kokugo.addEventListener("keyup", calculation, false);
        sugaku.addEventListener("keyup", calculation, false);
        eigo.addEventListener("keyup", calculation, false);
        rika.addEventListener("keyup", calculation, false);
        shakai.addEventListener("keyup", calculation, false);
    });
</script>

</html>