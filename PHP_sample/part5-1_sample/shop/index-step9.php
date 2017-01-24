<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('mydb');
mysql_query('SET NAMES UTF8');

$recordSet = mysql_query('SELECT m.name, i.* FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>商品管理</title>
</head>

<body>
<div id="wrap">
<div id="head">
<h1>商品管理</h1>
</div>

<div id="content">
  <table width="100%">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">メーカー</th>
      <th scope="col">商品名</th>
      <th scope="col">価格</th>
      </tr>
<?php
while ($table = mysql_fetch_assoc($recordSet)) {
?>
    <tr>
		<td><?php print(htmlspecialchars($table['id'])); ?></td>
		<td><?php print(htmlspecialchars($table['maker_id'])); ?></td>
		<td><?php print(htmlspecialchars($table['item_name'])); ?></td>
		<td><?php print(htmlspecialchars($table['price'])); ?></td>
      </tr>
<?php
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
