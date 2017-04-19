<?php
require_once('DBGoods.php');
$dbGoods = new DBGoods();
//新規登録の処理
if(isset($_POST['insert'])){
  $dbGoods->InsertGoods();
}
//全レコードを表示する処理
$recordlist = $dbGoods->SelectGoodsAll();
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