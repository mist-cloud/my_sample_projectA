<?php
// 100個のbuttonタグを作る
echo "<form>";
for ($i = 1; $i <= 100; $i++) {
    echo "<input type='submit' name='btn' value='{$i}' style='width:48px;' />";
}
echo "</form>";
// ボタンが押されていれば、押された番号を表示
if (isset($_GET["btn"])) {
    $btn = intval($_GET["btn"]);
    echo "<p>ボタンの{$btn}番が押されました!!</p>";
}
?>
