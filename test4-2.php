<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>チェックボタン、ラジオボタン、リストボックスの値を取得する</h1>

<?php
    print('性別：　' . htmlspecialchars($_POST['gender'], ENT_QUOTES));
?>
    
</body>
</html>
