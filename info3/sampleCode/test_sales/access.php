<?php
$USER= 'root';
$PW= 'dai';
$dnsinfo= "mysql:dbname=salesmanagement;host=localhost;charset=utf8";
try{
    $pdo = new PDO($dnsinfo,$USER,$PW);
    $res = "接続しました";
}catch(PDOException $e){
    $res = "dai:" .$e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>始めようphp</title>
<meta charset="utf-8">
</head>
<body>
<h1>PHPでMySQLに接続する</h1>
<?php echo $res;?>
</body>
</html>