<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>テストPHP</title>
</head>
<body>
    
    <form>
        <select name="year">
            <option>生年月日を選択してください。</option>
            <?php
            $this_year = date("Y");
            $end_year = $this_year - 80;
            $y = $this_year;
            while ($y >= $end_year) {
                echo "<option value='$y'>西暦{$y}年</option>";
                $y--;
            }
            ?>
        </select>
        <input type="submit" value="計算" />
    </form>
    <?php
    if (isset($_GET["year"])) {
        echo "今年".($this_year - intval($_GET["year"]))."さいです。";
    }
    ?>
    
</body>
</html>