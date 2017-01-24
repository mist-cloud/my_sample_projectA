<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>郵便番号を正規表現を使ってチェックする</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>郵便番号を正規表現を使ってチェックする</h1>
</div>

<div id="content">
<p style="margin-top: 200px">
<?php
$zip = mb_convert_kana($_REQUEST['zip'], 'a', 'UTF-8');

if (preg_match("/\A\d{3}\-\d{4}\z/", $zip)) {
	print('郵便番号：〒' . $zip);
} else {
	print('※郵便番号は 123-4567の形式でご記入ください');
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
