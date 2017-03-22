<?php
//巨大なファイルを少しずつ読み込みたい場合に。１行ずつデータを読み書きする方法。
//fopenはファイルを指定モードで開き、ハンドルを返す。fcloseはファイルを閉じる。
//1.ファイルを開く
$handle_r = fopen("old.txt", "r");//old.txtを読み込み用に開く
$handle_w = fopen("new.txt", "w");//new.txtを書き込み用に開く
//2.ファイルハンドルを指定して読み書きを行う
while (!feof($handle_r)){//ファイルポインターが終端まで読み込むまで繰り返す
    $line = fgets($handle_r);
    $line = str_replace("old@example.com", "new@example.com", $line);//検索文字列に一致したすべての文字列を置換する。左辺で検索し右辺に置換する
    fwrite($handle_w, $line);//fwriteでファイルにデータを書き込む
}
//3.ファイルを閉じる
fclose($handle_r);//ファイルを閉じる
fclose($handle_w);//ファイルを閉じる

?>