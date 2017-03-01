<html>
<head><title>PHP TEST／複数のデータベースから情報を持ってきて結合（リレーション）表示する</title></head>
<body>
<h1>PHP TEST／複数のデータベースから情報を持ってきて結合（リレーション）表示する</h1>
<p>SQLのSELECT文「while」構文を使う</p>
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
$stmt = $db->query("SELECT * FROM makers,my_items WHERE makers.id=my_items.maker_id");//SELECT *（対象は全てのカラム） FROM テーブル名１,テーブル名２ WHERE(条件)は、idとidが=(同じもの)を結合して表示する
while ($row = $stmt->fetch()) {
    //my_itemsテーブル
    $maker_id = $row["maker_id"];
    $item_name = $row["item_name"];
    $price = $row["price"];
    $keyword = $row["keyword"];
    //makersテーブルをリレーション
    $name = $row["name"];
    $address = $row["address"];
    echo "(生産者No.{$maker_id}：{$name}さん) <br />住所：{$address}<br />商品名:『{$item_name}』／{$price}円<br />特徴：{$keyword}<br /><br />";
}

?>
</body>
</html>