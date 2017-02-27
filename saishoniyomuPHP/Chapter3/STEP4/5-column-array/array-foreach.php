<?php
// 配列の要素を処理
$fruits = array("バナナ", "リンゴ", "イチゴ");
foreach ($fruits as $f) {
    echo "<div>{$f}が食べたい!</div>";
}
echo "<hr/>";
// 連想配列の要素を処理
$colors = array("赤"=>"#FF0000", "青"=>"#0000FF", "紫"=>"#FF00FF");
foreach ($colors as $label => $code) {
    echo "<div style='color: $code'>$label ($code)</div>";
}
 