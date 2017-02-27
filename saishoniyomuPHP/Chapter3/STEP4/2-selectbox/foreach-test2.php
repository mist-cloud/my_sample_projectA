<?php
// 配列変数を初期化
$fruits = array("イチゴ"=>300, "バナナ"=>120, "オレンジ"=>200, "マンゴー"=>540);
// 変数の要素を一つずつ列挙
echo "<table>";
foreach ($fruits as $item => $price) {
    echo "<tr><th>$item</th><td>{$price}円</td></tr>\n";
}
echo "</table>";
