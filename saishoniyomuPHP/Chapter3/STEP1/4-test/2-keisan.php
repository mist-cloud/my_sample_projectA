<?php
/*
[問題]
200円のケーキを8個、180円のプリンを5個を買う予定でした。
しかし、プリンの方が美味しそうに見えたので、プリンを5個、ケーキを8個買うことにしました。
これにより予算はいくら節約できたでしょうか。
*/
?>
<?php
$cake = 200;
$pudding = 180;
$v1 = ($cake * 8 + $pudding * 5);
$v2 = ($cake * 5 + $pudding * 8);
$sa = $v1 - $v2;
echo "結果、{$sa}円安くなりました。";