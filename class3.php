<?php
/* 関数ファイルを別に作成したものを読み込む*/
/* 別ファイルのコードを利用するには必ず require_once関数を利用する */
require_once('func.php');
$res = "";
if (isset($_POST['submit'])) {
    $res = JudgeEvenOdd($_POST['num']);
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