<?php
echo "<form>";
for ($i = 1; $i　<= 100; $i++) {
    echo "<input type='submit' name='btn' value='{$i}' style='width:48px' />";
    if ($i == 100) break;
}
echo "</form>";
//ボタンが
if (isset($_GET["btn"])) {
    $btn = intval($_GET["btn"]);
    echo "<p>ボタン{$btn}番押された</p>";
}
?>
