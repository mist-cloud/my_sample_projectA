<?php
session_start();
// 既存の値を調べる
$cnt = isset($_SESSION["cnt"]) ? $_SESSION["cnt"] : 0;
// 値を足す
$cnt++;
// 記憶する
$_SESSION["cnt"] = $cnt;
// 結果を表示する
echo "<p>{$cnt}回目の訪問ありがとうございます!</p>";
