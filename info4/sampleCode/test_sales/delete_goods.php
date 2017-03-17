<?php
$USER= 'root';
$PW= 'dai';
$dnsinfo= "mysql:dbname=salesmanagement;host=localhost;charset=utf8";
try{
    $pdo = new PDO($dnsinfo,$USER,$PW);
    $sql = "DELETE FROM goods WHERE GoodsID=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('1999'));
    $sql = "SELECT * FROM goods";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(null);
    $res = "<table>\n";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $res .= "<tr><td>" .$row['GoodsID'] ."</td><td>" .$row['GoodsName'] 
            ."</td><td>" .$row['Price'] ."</td></tr>\n";
    }
    $res .= "</table>\n";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>始めようphp</title>
<meta charset="utf-8">
<style>
table{border-collapse: collapse;}
td{border:1px solid black;}
</style>
</head>
<body>
<h1>goodsテーブルのレコードを削除する</h1>
<?php echo $res;?>
</body>
</html>