<?php
// 旧月名と現在の月の対応
$moon = array( 1=>"睦月", 2=>"如月", 3=>"弥生", 4=>"卯月", 
               5=>"皐月", 6=>"水無月", 7=>"文月", 8=>"葉月", 
               9=>"長月", 10=>"神無月", 11=>"霜月", 12=>"師走");
// パラメータが送信されているか？
if (isset($_GET["moon"])) {
    // 結果を表示
    $no = intval($_GET["moon"]);
    $name = $moon[$no];
    echo "{$name}は、{$no}月です。";
} else {
    // セレクトボックスを表示
    echo "<form><select name='moon'>";
    foreach ($moon as $no => $name) {
        echo "<option value='$no'>$name</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='送信'/>";
    echo "</form>";
}
