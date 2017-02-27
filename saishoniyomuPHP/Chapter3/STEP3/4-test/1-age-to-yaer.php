<?php
if (isset($_GET["age"])) {
    // 年齢から生年を計算して表示
    $age = intval($_GET["age"]);
    $this_year = date("Y");        // 今年を得る
    $r_year = $this_year - $age;
    echo "<p>今年{$age}才→{$r_year}年生まれです。</p>";
}
else {
    // 入力フォームを表示
    echo "<form><select name='age'>";
    echo "<option>年齢を選択してください。</option>";
    for ($i = 1; $i < 99; $i++) {
        echo "<option value='$i'>{$i}才</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='計算'>";
    echo "</form>";
}
?>
