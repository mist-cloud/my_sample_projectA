<?php
ini_set('display_errors', 'on');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>曜日付のカレンダーを表示する</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>曜日付のカレンダーを表示する</h1>
</div>

<div id="content">
<h2>2010年 5月のカレンダー</h2>
<?php
$week = array('金', '土', '日', '月', '火', '水', '木');
for ($i=1; $i<=31; $i++) {
	print($i . '日(' . $week[$i%7] . ')<br />');
}
?>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
