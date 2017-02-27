<pre><?php
// 足し算をするだけの関数の定義
function my_add( $a, $b ) {
  $c = $a + $b;
  return $c;
}

echo my_add(3, 5) . "\n"; // →表示結果 : 8
echo my_add(4, 2) . "\n"; // →表示結果 : 6
echo my_add(2, 3) . "\n"; // →表示結果 : 5
