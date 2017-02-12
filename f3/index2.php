<?php
session_start();
if (isset($_POST['my_id'])) {
    $_SESSION['my_id'] = $_POST['my_id'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>セッションで保持</h1>

<p>ようこそ<?php echo $_SESSION['my_id']; ?>さん</p>
<p><a href="index3.php">次のページへ</a></p>
</body>
</html>
