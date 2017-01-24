<?php
$myId = $_POST['my_id'];
$password = $_POST['password'];
$save = $_POST['save'];

// Cookieに保存
if ($save == 'on') {
	setcookie('my_id', $myId, time() + 60 * 60 * 24 * 14);
	$message = 'ログイン情報を記録しました';
} else {
	setcookie('my_id');
	$message = '記録しませんでした';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>入力されたIDを次回アクセス時まで覚える</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>入力されたIDを次回アクセス時まで覚える</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<p><?php echo $message; ?></p>
<p><a href="./sample17_input.php">戻る</a></p>
</p>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
