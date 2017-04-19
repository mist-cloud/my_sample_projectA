<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>テストPHP</title>
</head>
<body>

    <?php
    $price = 3000;
    $price2 = $price * 1.08;
    echo "税抜き金額 = {$price} 円<br />";
    echo "税込み金額 = {$price2} 円<br /><br />";
    ?>
    
    <?php
    /*　文字列123をintaval()関数で数値に変換
    var_dumpで型と値をテスト出力*/
    $str = "123";
    $var = intval($str);
    var_dump($var);
    echo "<br /><br />";
    ?>
    
    <?php
    /*　文字列をintaval()関数で変換する際には、できるだけ変換しようとする。頭文字が数字の場合は小数点以下は切り捨てて数値以外の文字列は無視する。
    頭文字が文字列の場合は無視する。その場合は数値0を返す　*/
    $str = "78.9yen";
    $val = intval($str);
    var_dump($val);
    echo "<br /><br />";
    ?>
    
    <?php
    /*　文字列をfloatval()関数で数値に変換する場合、小数点以下を切り捨てない。それ以外はintaval()関数と同じ挙動　*/
    $str = "123.45usd";
    $val = floatval($str);
    var_dump($val);
    ?>

</body>
</html>