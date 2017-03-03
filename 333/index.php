<?php
$i = 1;
while ( $i <= 10 ) {
    echo "($i)";
    $i++;
}
?>


<form>
<select name="year">
    <option>年数を選んでください。</option>
    <?php
    $this_year = date("Y");//dateで今年の年数(2017)を取得。$this_yearに代入
    $end_year = $this_year - 80;//終了年を計算
    $y = $this_year;//開始する年をセット
    while ($y >= $end_year) {//繰り返し処理
        echo "<option value='$y'>西暦{$y}年</option>";
        $y--;//一年分減算する
    }
    ?>
</select>
<input type="submit" value="計算" />
</form>
<?php
if (isset($_GET["year"])) {
    echo "今年".($this_year - intval($_GET["year"]))."才です。";
}
?>