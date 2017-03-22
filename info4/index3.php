<?php
//ファイルパスを指定
$target_dir = dirname(__FILE__);//__FILE__は実行されたプログラム自身のパス(ファイル名含む)を表す。
//dirname()関数は「パス＋ファイル名」のうち、パスの部分だけを取り出す。
$target_file = $target_dir . "/test.txt";//実行されたPHPプログラムと同じディレクトリに保存する。
//ファイルに文字列を書き込む
file_put_contents($target_file, "光陰矢の如し");//ファイルにデータを書き込む。
//ファイルから文字列を読み込む
$str = file_get_contents($target_file);//ファイルの内容を全部読み込んで返す。
echo "読み書きした文字列： $str";
?>