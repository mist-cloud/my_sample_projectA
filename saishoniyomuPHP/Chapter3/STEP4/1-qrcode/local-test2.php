<?php
// 変数$cを30にセットする関数
function set_c() {
  global $c; // 変数 $c をグローバル宣言する
  $c = 30;
}
// 関数を利用するプログラム
$c = 10;
set_c();
echo $c; // 答えは ... 30
