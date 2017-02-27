<form>
<select name="year">
<option>生年を選んでください。</option>
<?php
    $this_year = date("Y");       // 今年を得る
	$end_year  = $this_year - 80; // 終了年を計算(80年分)
	$y = $this_year;              // 開始する年をセット
    while ($y >= $end_year) {     // 繰り返し処理
	  echo "<option value='$y'>西暦{$y}年</option>";
      $y--;                       // 1年分減算する
    }
?>
</select>
<input type="submit" value="計算" />
</form>
<?php // 生年を計算して表示
if (isset($_GET["year"])) {
    echo "今年".($this_year - intval($_GET["year"]))."才です。";
}
?>
