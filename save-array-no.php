<?php
//配列をファイルに保存
$list = array("Apple"=>300, "Banana"=>130, "Orange"=>200);
file_put_contents("fruits.txt", $list);
//保存したデータを読み込んで表示
$list = file_get_contents("fruits.txt");
echo $list["Banana"]; //→正しく（130）になる
?>