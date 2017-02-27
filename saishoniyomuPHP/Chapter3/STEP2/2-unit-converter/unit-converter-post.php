<html><head><meta charset="UTF-8" /></head>
<body style="font-size:24px; background-color:#CCCCCC;">
<h1>インチからセンチへ変換</h1>
<?php
if (isset($_POST["inch"])) { // 値が入力されているか?
    // 変換結果を表示
    $inch = $_POST["inch"];   // 入力されたデータを取得
    $inch = floatval($inch); // 文字列から数値へ変換
    $cm   = 2.54 * $inch;
    echo "<div>(結果) {$inch}インチ = {$cm}センチメートル</div>";
} else {
    // 値が入力されていない場合(フォームを表示)
    $self = $_SERVER["SCRIPT_NAME"]; // このファイルのURLを取得
    echo "<form action='$self' method='POST'>";
    echo "<input type='text' name='inch' value='' />";
    echo "<input type='submit' value='変換' />";
    echo "</form>";	
}
?>
</body></html>
