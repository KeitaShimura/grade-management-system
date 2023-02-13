<?php
require_once "../../config/db.php";
require_once "../../model/Exams.php";
require_once "../../controller/ExamsController.php";
$obj = new ExamsController();
$exams = $obj->index();

if (isset($_POST['csvoutput'])) {

    //現在の日時
    $now = new DateTime();

    $csvfilename = "";
    $csvfilename .= 'test-';
    $csvfilename .= $now->format('Ymd');

    $fileNm = $csvfilename . ".csv";
    $csvstr = "";

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $fileNm);
    header("Content-Transfer-Encoding: binary");

    $csvstr .= mb_convert_encoding("ID", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("テスト", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("名前", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("国語", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("数学", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("英語", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("理科", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("社会", "SJIS", "UTF-8") . ",";
    $csvstr .= mb_convert_encoding("合計", "SJIS", "UTF-8") . "\r\n";

    foreach ($exams as $exam) :
        $row = mb_convert_encoding($exam, "SJIS", "UTF-8");

        $csvstr .= $exam['id'] . ",";
        $csvstr .= mb_convert_encoding($exam['test_name'], "SJIS", "UTF-8") . ",";
        $csvstr .= mb_convert_encoding($exam['student_name'], "SJIS", "UTF-8") . ",";
        $csvstr .= $exam['kokugo'] . ",";
        $csvstr .= $exam['sugaku'] . ",";
        $csvstr .= $exam['eigo'] . ",";
        $csvstr .= $exam['rika'] . ",";
        $csvstr .= $exam['shakai'] . ",";
        $csvstr .= $exam['goukei'] . "\r\n";
    endforeach;

    echo $csvstr;
    exit();
}
