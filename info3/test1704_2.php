<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>テストPHP</title>
</head>
<body>

    <?php
    if (isset($_GET["inch"])) {
        $inch = $_GET["inch"];
        $inch = floatval($inch);
        $cm = 2.54 * $inch;
        echo "<div>（結果）{$inch}インチ = {$cm}センチメートル</div>";
    } else {
        /* $self = $_SERVER["SCRIPT_NAME"]; */
        $self = "test1704_2.php";
        echo "<form action='$self' method='GET'>";
        echo "<input type='text' name='inch' value='' />";
        echo "<input type='submit' value='変換' />";
        echo "</form>";
    }
    ?>

</body>
</html>