<?php
// -------------------------------------------------------------------
// ファイルパスを設定
$target_dir  = dirname(__FILE__);
$target_file = $target_dir . "/test.txt";
// -------------------------------------------------------------------
// [書き込み編]
// (1) このディレクトリに書き込みできるか調べる
if (!is_writable($target_dir)) {
    echo "(1)ディレクトリ書き込みが出来ません: $target_dir";
    exit;
}
// (2) ファイルが既に存在するか調べる
if (file_exists($target_file)) {
    // (3) ファイルに書き込めるか調べる
    if (!is_writable($target_file)) {
        echo "(3)ファイル書き込みが出来ません: $target_file";
        exit;
    }
}
// (4) ファイルに文字列を書き込む
file_put_contents($target_file, "光陰矢のごとし");
// -------------------------------------------------------------------
// [読み込み編]
// (4) ファイルが存在するか調べる
if (!file_exists($target_file)) {
    echo "(4)ファイルが存在しません。$target_file";
    exit;
}
// (5) このファイルを読み込めるか調べる
if (!is_readable($target_file)) {
    echo "(5) ファイルのが読み込みが出来ません。";
    exit;
}
// (6) ファイルから文字列を読み込む
$str = file_get_contents($target_file);
echo "読み書きした文字列: $str";

