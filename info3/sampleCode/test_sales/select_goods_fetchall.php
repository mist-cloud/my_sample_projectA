<?php
$USER= 'root';
$PW= 'dai';
$dnsinfo= "mysql:dbname=salesmanagement;host=localhost;charset=utf8";
try{
    $pdo = new PDO($dnsinfo,$USER,$PW);
	$sql = "SELECT * FROM goods";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(null);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$res = "";
	foreach($rows as $row){
		$res .= $row['GoodsID'] ."," .$row['GoodsName'] ."," .$row['Price'] ."<br>\n";
	}
}catch(Exception $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>始めようphp</title>
<meta charset="utf-8">
</head>
<body>
<h1>goodsテーブルのレコードを選択する</h1>
<?php echo $res;?>
</body>
</html>