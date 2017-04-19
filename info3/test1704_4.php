<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>テストPHP</title>
</head>
<body>

    <?php
    $i = 1;
    /* 波カッコを省略して書くことも可能 */
    if ($i == 1) echo "1でした";
    if ($i == 2) echo "2でした";
    if ($i == 3) echo "3でした";
    echo "<br /><br />";
    ?>
    
    <?php
    $v = 50;
    $v = $v + 20;
    echo $v;
    echo "<br /><br />";
    ?>
    
    <?php
    /* 代入しないと変数はそのままの値 */
    $z = 50;
    echo $z + 20;
    echo $z;
    echo "<br /><br />";
    ?>
    
    <?php
    /* ++変数の値を1だけ加算する
       --変数の値を1だけ減算される*/
    $point = 12;
    $point++;
    /*$point--;*/
    echo $point;
    echo "<br />";
    echo "<br />";
    ?>
    
    <?php
    /* 
    ++$は値を変更してから表示
    $++は表示してから値を変更
    */
    $point2 = 30;
    echo ++$point2;
    echo "<br />";
    echo $point2;
    echo "<br />";
    
    $point3 = 30;
    echo $point3++;
    echo "<br />";
    echo $point3;
    echo "<br />";
    ?>
    
    
</body>
</html>