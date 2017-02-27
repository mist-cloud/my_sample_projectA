<?php
/*　サンプル　*/
echo pow(2, 3);//powはべき乗。2を3回かける。2*2*2//8
$a = 56.78; echo ceil($a);//四捨五入//57
$b = 3542; $b = floor($b/100) * 100; echo $b;//floorは小数点以下を切り捨て。ここでは100の単位で切り捨ててる//3500
?>


<?php
//フォームからデータが送信されているか？
if(isset($_GET["w"]) && isset($_GET["h"])) {
    //データが送信されていればBMIを計算
    $w = floatval($_GET["w"]);
    $h = floatval($_GET["h"]);
    $bmi = $w / pow($h / 100, 2);
    $per = floor(($bmi / 22) * 100);
    //結果を表示
    echo "体重{$w}kg,身長{$h}cm<br />";
    echo "BMIは{$bmi}<br />";
    echo "肥満度は{$per}%です。";
} else {
    //データが送信されていないので、フォームを表示
    echo "<form>";
    echo "身長：<input type='text' name='h'> cm <br />";
    echo "体重：<input type='text' name='w'> kg <br />";
    echo "<input type='submit' value='BMI判定'>";
    echo "</form>";
}
?>