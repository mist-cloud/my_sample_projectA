<html><head><meta charset="UTF-8" /></head>
<body style="font-size:24px; background-color:#CCCCCC;">
<h1>マイルからキロへ変換</h1>
<?php
if (isset($_GET["mile"])) { // 値が入力されているか?
    // 変換結果を表示
    $mile = $_GET["mile"];    // 入力されたデータを取得
    $mile = floatval($mile);  // 文字列から数値へ変換
    $km   = 1.609344 * $mile; // マイルからキロへの変換
    echo "<div>(結果) {$mile}マイル = {$km}キロメートル</div>";
} else {
    // 値が入力されていない場合(フォームを表示)
    $self = $_SERVER["SCRIPT_NAME"]; // このファイルのURLを取得
    echo "<form action='$self' method='GET'>";
    echo "<input type='text' name='mile' value='' />";
    echo "<input type='submit' value='変換' />";
    echo "</form>";	
}
?>
</body></html>