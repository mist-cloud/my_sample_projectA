<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>テストPHP</title>
</head>
<body>

    <?php
    /* 2 * 2 * 2の意味 */
    echo pow(2, 3);
    echo "<br /><br />";
    ?>
    
    <?php
    /* 小数点を切り上げて値を返す */
    $v = 56.78;
    echo ceil($v);
    echo "<br /><br />";
    ?>
    
    <?php
    /* 3542を100単位でで小数点以下切り捨てて値を返す */
    $z = 3542;
    $z = floor($z/100) * 100;
    echo $z;
    echo "<br /><br />";
    ?>
    
    <?php
    /* round()の第二引数はオプションで指定する、丸める桁数、第三引数も指定できる */
    $g = 123.456;
    $g = round($g, 1);
    echo $g;
    ?>
    
    <!--
    pow(基数,指数)            べき城を計算する
    floor(数値)              数値の端数を切り捨てる
    ceil(数値)               数値の端数を切り上げる
    round(数値)              数値の端数を丸める
    -->

</body>
</html>