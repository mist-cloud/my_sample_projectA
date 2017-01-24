<?php
require('dbconnect.php');

$page = $_REQUEST['page'];
if ($page == '') {
	$page = 1;
}
$page = max($page, 1);

// 最終ページを取得する
$sql = 'SELECT COUNT(*) AS cnt FROM my_items';
$recordSet = mysql_query($sql);
$table = mysql_fetch_assoc($recordSet);
$maxPage = ceil($table['cnt'] / 5);
$page = min($page, $maxPage);

$start = ($page - 1) * 5;
$recordSet = mysql_query('SELECT m.name, i.* FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC LIMIT ' . $start . ',5');
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
  <p><a href="input.php">新しい商品を登録する</a></p>
  <table width="100%">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">メーカー</th>
      <th scope="col">商品名</th>
      <th scope="col">価格</th>
      <th scope="col">編集・削除</th>
      </tr>
<?php
while ($table = mysql_fetch_assoc($recordSet)) {
?>
    <tr>
      <td><?php print(htmlspecialchars($table['id'])); ?></td>
      <td><?php print(htmlspecialchars($table['name'])); ?></td>
      <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
      <td><?php print(htmlspecialchars($table['price'])); ?></td>
      <td><a href="update.php?id=<?php print(htmlspecialchars($table['id']));?>">編集</a>　<a href="delete.php?id=<?php print(htmlspecialchars($table['id']));?>" onclick="return confirm('削除してよろしいですか？');">削除</a></td>
      </tr>
<?php
}
?>
  </table>
  
<ul class="paging">
<?php
if ($page > 1) {
?>
<li><a href="index.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
<?php
} else {
?>
<li>前のページへ</li>
<?php
}
?>
<?php
if ($page < $maxPage) {
?>
<li><a href="index.php?page=<?php print($page + 1); ?>">次のページへ</a></li>
<?php
} else {
?>
<li>次のページへ</li>
<?php
}
?>
</ul>
</div>

<div id="foot">
<p><img src="images/txt_copyright.png" width="136" height="15" alt="(C) H2O Space. MYCOM" /></p>
</div>

</div>
</body>
</html>
