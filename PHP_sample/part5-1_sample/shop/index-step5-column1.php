<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>INSERT以外のSQLを実行してみよう(UPDATE)</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>トップページ</h1>
</div>

<div id="content">
<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('mydb') or die(mysql_error());
mysql_query('SET NAMES UTF8');

mysql_query('UPDATE my_items SET item_name="白桃" WHERE id=6') or die(mysql_errro());
echo '変更しました';
?>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
