<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>商品の一覧をチェックボックスに表示する</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>商品の一覧をチェックボックスに表示する</h1>
</div>

<div id="content">
<div style="margin-top: 200px">
<form action="" method="get">
<dl>
<dt>商品</dt>
<dd>
<?php
$items = array('a-1'=>'ガム', 'b-1'=>'チョコレート', 'c-3'=>'クッキー');

foreach($items as $itemKey => $itemValue) {
	print ('<input type="checkbox" id="' . $itemKey . '" value="' . $itemKey . '" /><label for="' . $itemKey . '">' . $itemValue . '</label>　');
}
?>
</dd>
</dl>
<input type="submit" value="送信する" />
</form>
</div>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
