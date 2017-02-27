<div style='font-size:32px;'>
<?php
for ($i = 0; $i < 200; $i++) {
    // 色をランダムに変更
    $r = mt_rand(1, 3);
    switch($r) {
        case 1: $style = "color:orange;"; break;
        case 2: $style = "color:yellow;"; break;
        case 3: $style = "color:red;";    break;
    }
    // ★を出力
    echo " <span style='$style'>★</span>";
    echo " "; // 自動的に改行するようにスペースを出力
}
?>
</div>