<?php
$year = 2014;
$mon  = 5;
$cur = strtotime("$year-$mon-1"); // 初日のタイムスタンプを求める
for(;;) {
    // これから表示するタイムスタンプの月/日を求める
    $cur_mon = intval(date("m", $cur));
    $d = date("d", $cur);
    if ($cur_mon > $mon) break; // 月が変わっているなら繰り返しを終了
    echo "[$d]"; // 日付を出力
    // 一日進める
    $cur += 24*60*60;
}
