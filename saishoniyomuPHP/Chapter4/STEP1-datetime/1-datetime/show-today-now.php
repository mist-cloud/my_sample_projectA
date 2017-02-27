<?php
// タイムゾーンを明示的に指定する場合
date_default_timezone_set("Asia/Tokyo");
// 現在時刻をエポックタイムスタンプ(UNIXタイム)で得る
$now = time(); 
// 様々な書式で日付を出力する
show_div("red",    date("Y/m/d", $now));    // 例) 2012/05/03
show_div("red",    date("H:i:s", $now));    // 例) 17:18:56
show_div("blue",   date("Y年n月j日", $now));// 例) 2012年5月3日
show_div("blue",   date("H時i分s秒", $now));// 例) 17時18分56秒
show_div("blue",   date("Y年n月j日", $now));// 例) 2012年5月3日
// 特定の書式
show_div("green",  date("c", $now));        // ISO 8601
show_div("green",  date("r", $now));        // RFC 2822
// 曜日
$week = array("日","月","火","水","木","金","土");
show_div("red",    date("w",$now));         // 例) 4
show_div("red",    $week[date("w",$now)]);  // 例) 月
//--------------------------------------------------------------------
// 文章を指定のスタイルで出力する関数
function show_div($color, $str) {
    $str = htmlspecialchars($str);
    echo "<div style='color:$color;'>$str</div>";
}
