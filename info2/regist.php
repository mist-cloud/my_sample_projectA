<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<body>
<?php



//MySQQLへの接続
$dsn = 'mysql:dbname=TestDB;host=localhost';
$user = 'root';
$password = 'root';
try{
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo -> prepare("INSERT INTO address (no, name, tel) VALUES (:no, :name, :tel)");
    $stmt->bindValue(':no', $no, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);

    $stmt->execute();
    
}catch (PDOException $e){
    echo('データベースに接続できません。'.$e->getMessage());//接続失敗で表示される
    exit;
}



/*$con = mysql_connect('localhost', 'root', 'root');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('TestDB', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}*/


    
    
    

/*$result = mysql_query("INSERT INTO address(no, name, tel) VALUES('$no', '$name', '$tel')", $con);
if (!$result) {
  exit('データを登録できませんでした。');
}
    
$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}
*/
?>
<p>登録が完了しました。<br /><a href="index.html">戻る</a></p>
</body>
</html>