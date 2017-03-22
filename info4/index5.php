<?php
//巨大なファイルを少しずつ読み込みたい場合に。１行ずつデータを読み書きする方法。
//fopenはファイルを指定モードで開き、ハンドルを返す。fcloseはファイルを閉じる。
/* $txt = file_get_contents("old.txt");
$txt = str_replace("old@example.com", "new@example.com", $txt);
file_put_contents("new.txt", $txt);
echo "ok"; */
//1.ファイルを開く
$handle_r = fopen("old.txt", "r");
$handle_w = fopen("new.txt", "w");
//2.ファイルハンドルを指定して読み書きを行う
while (!feof($handle_r)){
    $line = fgets($handle_r);
    $line = str_replace("old@example.com", "new@example.com", $line);
    fwrite($handle_w, $line);
}
//3.ファイルを閉じる
fclose($handle_r);
fclose($handle_w);
echo "ok";
?>