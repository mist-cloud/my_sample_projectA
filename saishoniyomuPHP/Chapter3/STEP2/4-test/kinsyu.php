<html><head><meta charset="UTF-8" /></head>
<body style="font-size:24px; background-color:#EEEEFF;">
<h3>金種計算ツール</h3>
<?php
if (isset($_GET["m500"])) { // 値が入力されているか?
    $m500 = 0; $m100 = 0; $m50 = 0; $m10 = 0; // 枚数の初期化
    if (isset($_GET["m500"])) $m500 = intval($_GET["m500"]);
    if (isset($_GET["m100"])) $m100 = intval($_GET["m100"]);
    if (isset($_GET["m50"]))  $m50  = intval($_GET["m50"]);
    if (isset($_GET["m10"]))  $m10  = intval($_GET["m10"]);
    echo "500円が{$m500}枚<br/>100円が{$m100}枚<br/>";
    echo "50円が{$m50}枚<br/>10円が{$m10}枚。<br/><br/>";
    // 計算結果を表示
    $value = $m500 * 500 + $m100 * 100 + $m50 * 50 + $m10 * 10;
    echo "合計は、{$value}円";
} else {
    // 値が入力されていない場合(フォームを表示)
    $self = $_SERVER["SCRIPT_NAME"]; // このファイルのURLを取得
    echo "<form action='$self' method='GET'>";
    echo "<p>500円: <input type='text' name='m500' value='0' /></p>";
    echo "<p>100円: <input type='text' name='m100' value='0' /></p>";
    echo "<p> 50円: <input type='text' name='m50'  value='0' /></p>";
    echo "<p> 10円: <input type='text' name='m10'  value='0' /></p>";
    echo "<input type='submit' value='計算' />";
    echo "</form>";    
}
?>
</body></html>
