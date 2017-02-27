<h3>最近の写真</h3>
<?php
$no = rand(1, 3); // ランダムな値を得る
switch ( $no ) {  // 値によって処理を分岐する
    case 1: $file = "photo1.jpg";   break;
    case 2: $file = "photo2.jpg";   break;
    case 3: $file = "photo3.jpg";   break;
}
echo "<img src='$file' width='320' />";
?>