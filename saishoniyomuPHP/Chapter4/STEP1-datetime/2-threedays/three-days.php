<pre><?php
// 変数に秒を代入
$hour = 60 * 60;    // 一時間は、60秒x60分
$day  = 24 * $hour; // 一日は、24時間
// 計算
$now = time();
$result = $now + 3 * $day;
// 結果を表示
echo "今日は....".date("Y-m-d", $now)."\n";
echo "3日後は...".date("Y-m-d", $result). "\n";

