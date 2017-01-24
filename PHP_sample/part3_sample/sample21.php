<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>小数を整数に切り上げる・切り下げる</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>小数を整数に切り上げる・切り下げる</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<?php
print '<p>3000円のものから 100円値引きした場合は、' . floor(100 / 3000 * 100) . '%引きです</p>';
?>
<h2>その他の計算</h2>
<ul>
<?php
print '<li>元の計算式→' . 100 / 3000 * 100 . '</li>';
print '<li>切り上げ（ceil）→' . ceil(100 / 3000 * 100) . '</li>';
print '<li>四捨五入（round）→' . round(100 / 3000 * 100, 1) . '</li>';
?>
</ul>
</p>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
