<h3>5月の予定</h3>
<?php
showStyleTag();
// 2014年5月のカレンダーを作成する
$yotei = array(5=>"Aさんの結婚式",10=>"Bさんと打ち合わせ");
showCalendar(2014,5, $yotei);
//--------------------------------------------------------------------
//カレンダーを表示する関数
function showCalendar($year, $mon, $yotei) {
    $week_list = array("日","月","火","水","木","金","土");
    $colors    = array(0=>"#fff0f0",6=>"#f0f0ff");
    $cur = strtotime("$year-$mon-1"); // 初日のタイムスタンプを求める
    echo "<table>";
    for(;;) {
        // 月番号、日付、曜日を得る
        $cur_mon = intval(date("m", $cur));
        if ($cur_mon > $mon) break; // 月が変わったら終わる
        $d = date("d", $cur);
        $w = date("w", $cur);
        $weekname = $week_list[$w];
        $color    = isset($colors[$w]) ? $colors[$w] : "white";
        // 予定があるか確認する
        $i = intval($d);
        $sc = isset($yotei[$i]) ? $yotei[$i] : "なし";
        // HTMLを出力する
        echo "<tr style='background-color:$color'>";
        echo "<td>$d</td><td>$weekname</td>";
        echo "<td>$sc</td>";
        echo "</tr>";
        // 一日進める
        $cur += 24*60*60;
    }
    echo "</table>";
}
function showStyleTag() { // カレンダーのためのCSSを表示
    echo <<< __STYLE__
<style>
table { border-top: solid 1px black;
        border-collapse: collapse; border-spacing: 0; }
td    { border-bottom: solid 1px black; padding: 6px; margin: 0; }
</style>
__STYLE__;
}
