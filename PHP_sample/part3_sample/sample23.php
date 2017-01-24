<?php
ini_set('display_errors', 'on');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>ファイルアップロードを受信する</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>ファイルアップロードを受信する</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<?php
$file = $_FILES['my_img'];

print('ファイル名(name): ' . $file['name'] . '<br />');
print('ファイルタイプ(type): ' . $file['type'] . '<br />');
print('アップロードしたファイル(tmp_name): ' . $file['tmp_name'] . '<br />');
print('エラー内容(error): ' . $file['error'] . '<br />');
print('サイズ(size): ' . $file['size'] . '<br />');

// ファイルアップロードの処理をする
$ext = substr($file['name'], -3);
if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png') {
	$filePath = './user_img/' . $file['name'];
	move_uploaded_file($file['tmp_name'], $filePath);
	print('<img src="' . $filePath . '" />');
} else {
	print('※拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください');
}
?>
</p>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
