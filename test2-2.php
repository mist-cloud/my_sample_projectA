<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>フォームを使ったテスト2</h1>

<?php
    print ('お名前：　' . htmlspecialchars($_POST['my_name'], ENT_QUOTES));
?>
    
    
</body>
</html>
