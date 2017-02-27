<?php
// 既存の値を調べる
$cnt = isset($_COOKIE["cnt"]) ? $_COOKIE["cnt"] : 0;
// 値を足す
$cnt++;
// 記憶する
setcookie("cnt", $cnt, time() + (60*60*24*365));
// 結果を表示する
echo "<p>{$cnt}回目の訪問ありがとうございます!</p>";
