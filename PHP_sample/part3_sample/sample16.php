<?php
ini_set('display_errors', 'on');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>一行ごとにテーブルセルを色を変える</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>一行ごとにテーブルセルを色を変える</h1>
</div>

<div id="content">
<table>
<?php
for($i=1; $i<=10; $i++) {
	if ($i % 2) {
		print('<tr style="background-color: #bce0f2">');
	} else {
		print('<tr>');
	}
	print('<td>' . $i . '</td>');
	print('<td>' . $i . '行目の情報です</td>');
	print('</tr>');
}
?>
</table>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
