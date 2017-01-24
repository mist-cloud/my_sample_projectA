<?php
$success = file_put_contents('./news_data/news.txt', '2010-06-01 ホームページをリニューアルしました');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>ファイルに内容を書き込む</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>ファイルに内容を書き込む</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<?php
if ($success) {
	print('<p>ファイルへの書き込みが完了しました。</p>');
} else {
	print('<p>書き込みに失敗しました。ディレクトリの権限などを確認してください。</p>');
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
