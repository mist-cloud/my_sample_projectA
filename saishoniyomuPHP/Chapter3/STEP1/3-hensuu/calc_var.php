<?php
// 変数に値を設定
$apple_price = 160;   // リンゴの値段(税抜き)
$apple_count = 3;     // リンゴの数
$banana_price = 120;  // バナナの値段(税抜き)
$banana_count = 6;    // バナナの数
$people = 3;          // 何人で買うか
$tax_rate = 0.05;     // 税率
// 商品の合計を求める
$value = $apple_price * $apple_count + $banana_price * $banana_count;
// 税金の金額を求める
$tax = ($value * $tax_rate);
// 税込み金額を求める
$total = $value + $tax;
// 人数で割る
$value2 = $total / $people;
// 結果を表示
echo "合計は{$total}円、一人あたり{$value2}円です。";
