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
<title>PHPテスト</title>
</head>

<body>
<h1>COOKIEで保存</h1>    
    <p><?php echo $message; ?></p>
    <p><a href="index.php">戻る</a></p>
</body>
</html>
