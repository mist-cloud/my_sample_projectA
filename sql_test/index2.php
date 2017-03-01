<html>
<head><title>PHP TEST</title></head>
<body>

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

//テーブルを作成
$create_query = <<< __SQL__
CREATE TABLE IF NOT EXISTS items (
item_id INTEGER,
name TEXT,
price INTEGER
);
__SQL__;
$result = $db->exec($create_query);//SQLを実行
if ($result === false){//エラーがあれば表示する
    print_r($db->errorInfo()); exit;
}
$db->exec("DELETE FROM items");//以前にitemsテーブルを作成している場合一度初期化

//データを挿入
$idata = array(
    array("item_id"=>1, "name"=>"バナナ", "price"=>150),
    array("item_id"=>2, "name"=>"イチゴ", "price"=>300),
    array("item_id"=>3, "name"=>"イクラ", "price"=>270),
    array("item_id"=>4, "name"=>"カツオ", "price"=>980),
    array("item_id"=>5, "name"=>"タマゴ", "price"=>210)
);
foreach ($idata as $i) {
    //挿入する値をクォートする
    $item_id = intval($i["item_id"]);
    $name = $db->quote($i["name"]);
    //文字列にクォート
    $price = intval($i["price"]);
    $result = $db->exec(
        "INSERT INTO items (item_id,name,price)".
        "VALUES($item_id, $name, $price)");//SQLを実行
    if ($result === FALSE) {//エラーがあれば表示
        print_r($db->errorInfo());
    }
}

//データを表示
$stmt = $db->query("SELECT * FROM items");
while ($row = $stmt->fetch()) {
    $item_id = $row["item_id"];
    $name = $row["name"];
    $price = $row["price"];
    echo "($item_id) $name → {$price}円\n";
}

?>
</body>
</html>