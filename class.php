<?php
$res = "";
if(isset($_POST['submit'])) {
    if($_POST['num'] % 2 == 1) {
        $res = "奇数です";
    } else {
        $res = "偶数です";  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>初めてのクラス</title>
</head>
<body>
    <h1>Classの確認</h1>
    <form method="post" action="">
        <label>数字を入力<input type="text" name="num" required></label>
        <input type="submit" value="　判定　" name="submit" />
    </form>
    <?php echo $res; ?>
</body>
</html>