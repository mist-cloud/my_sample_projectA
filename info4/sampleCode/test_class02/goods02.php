<?php
require_once('db.php');
$db = new DB();
//新規登録の処理
if(isset($_POST['insert'])){
  $sql = "INSERT INTO goods VALUES(?,?,?)";
  $array = array($_POST['GoodsID'],$_POST['GoodsName'],$_POST['Price']);
  $db->executeSQL($sql,$array);
}
//全レコードを表示する処理
$sql = "SELECT * FROM goods";
$res = $db->executeSQL($sql,null);
$recordlist = "<table>\n";
while($row = $res->fetch(PDO::FETCH_ASSOC)){
  $recordlist .= "<tr><td>{$row['GoodsID']}</td>";
  $recordlist .= "<td>{$row['GoodsName']}</td>";
  $recordlist .= "<td>{$row['Price']}</td></tr>\n";
}
$recordlist .= "</table>\n";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>クラスの活用</title>
</head>
<body>
<h1>goodsマスターテーブル</h1>
<form action="" method="post">
<label>GoodsID<input type='text' name='GoodsID' size="8" required></label>
<label>GoodsName<input type='text' name='GoodsName' size="30" required></label>
<label>Price<input type='text' name='Price' size="8" required></label>
<input type='submit' name='insert' value=' 登録 '>
</form>
<hr />
<?php echo $recordlist;?>
<td></td>
</body>
</html>