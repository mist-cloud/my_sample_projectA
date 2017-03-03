<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>インチからセンチへ変換</h1>
    <?php
    if (isset($_GET["inch"])) {//フォームから値「inch」が送信されているか？
        //値が送信されて居る場合、変換結果を表示
        $inch = $_GET["inch"];
        $inch = floatval($inch);
        $cm = 2.54 * $inch;
        echo "<div>(結果){$inch}インチ　＝　{$cm}センチメートル</div>";
    } else {
        //値が送信されていない状態の処理
        $self = $_SERVER["SCRIPT_NAME"];
        echo "<form action='$self' method='GET'>";
        echo "<input type='text' name='inch' value='' />";
        echo "<input type='submit' value='変換' />";
        echo "</form>";
    }
    ?>
</body>
</html>