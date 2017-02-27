<?php
// 配列をファイルに保存
$list = array("Apple"=>300, "Banana"=>130, "Orange"=>200);
$savedata = serialize($list);
file_put_contents("fruits.txt", $savedata);
// 保存したデータを読み込んで表示
$loaddata = file_get_contents("fruits.txt");
$list = unserialize($loaddata);
echo $list["Banana"]; // → 正しく(130)になる

