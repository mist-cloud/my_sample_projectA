<?php
// 変数に値を代入する
$name  = "カリナ";
$age   = 20;
$hobby = "ギター";
$image = "calina.jpg";

// 画面にHTMLを表示する
echo "<html><body style='font-size:26px;'>\n";
echo "<h3>自己紹介</h3>\n";
echo "<img src='$image' width='300'><br/>";
echo "<ul>\n";
echo "<li>名前: {$name}</li>\n";
echo "<li>年齢: {$age}才</li>\n";
echo "<li>趣味: {$hobby}</li>\n";
echo "</ul>\n";
echo "</body></html>\n";
