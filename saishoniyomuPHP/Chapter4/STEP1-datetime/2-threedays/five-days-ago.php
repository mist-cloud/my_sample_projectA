<pre><?php
$day  = 24 * 60 * 60;
$now  = time();
$res  = $now - 5 * $day;
echo "今日は....." . date("Y-m-d", $now) . "\n";
echo "五日前は..." . date("Y-m-d", $res) . "\n";
