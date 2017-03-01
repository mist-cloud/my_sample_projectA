<html>
<head><title>PHP TEST／１つのデータベースから情報を持ってきて表示する</title></head>
<body>
<h1>PHP TEST／１つのデータベースから情報を持ってきて表示する</h1>
<?php
//教本ではSQLiteでtest.dbファイルを生成し保存している。
//改造してMysqlに接続する処理。17行目まで。
$dsn = 'mysql:dbname=mydb;host=localhost';
$user = 'root';
$password = 'root';
try{
    $db = new PDO($dsn, $user, $password);
    echo('接続に成功しました。<br>');//接続成功したら表示される
}catch (PDOException $e){
    echo('データベースに接続できません。'.$e->getMessage());//接続失敗で表示される
    exit;
}

//データを表示するテスト
$stmt = $db->query("SELECT * FROM my_items");
while ($row = $stmt->fetch()) {
    $maker_id = $row["maker_id"];
    $item_name = $row["item_name"];
    $price = $row["price"];
    $keyword = $row["keyword"];
    echo "(生産者No.{$maker_id}) 商品名:『{$item_name}』／{$price}円<br />特徴：{$keyword}<br />";
}

?>
</body>
</html>