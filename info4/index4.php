<?php
//このプログラムはローカル環境ではエラーは出ないが、本番環境ではエラーが出ることが多々ある。
//test.txtが読み取り専用の場合、エラーになる。
//webサーバーで扱うファイルにはパーミッション機能が備わっている。下記はアクセス権をチェックする方法。
//ファイルパスを設定
$target_dir = dirname(__FILE__);
$target_file = $target_dir . "/test.txt";
//----------------------------------------------------
//書き込み編
//1.書き込み可能かチェック
if (!is_writable($target_dir)) {//!is_writable書き込みができなかった場合
    echo "1.ディレクトリに書き込みができません： $target_dir";
    exit;
}
//2.ファイルが既に存在するか調べる
if (file_exists($target_file)) {
    //3.ファイルに書き込めるか調べる
    if (!is_writable($target_file)){
        echo "3.ファイルの書き込みが出来ません： $target_file";
        exit;
    }
}
//4.ファイルに文字列を書き込む
file_put_contents($target_file, "光陰矢の如し");
//----------------------------------------------------
//読み込み編
//4.ファイルが存在するか調べる
if (!file_exists($target_file)) {
    echo "4.このファイルが存在しません。　$target_file";
    exit;
}
//5.このファイルが読み込めるか調べる
if (!is_readable($target_file)){
    echo "5.ファイルの読み込みが出来ません。";
    exit;
}
//6.ファイルから文字列を読み込む
$str = file_get_contents($target_file);
echo "読み書きした文字列： $str";
?>