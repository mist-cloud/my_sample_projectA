<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>セッションで保持</h1>
    
<p><?php echo $_SESSION['my_id']; ?>さんの情報はまだ残っています。</p>
<p><a href="index4.php">ログアウトする？</a></p>
</body>
</html>
