<pre>
<?php
//データベースへの接続
try {
    //$db = new PDO("sqlite:test2.db");
    //Mysqlに接続
    $username = "root";
    $password = "root";
    $pdo = new POD (
        'mysql:host=localhost;dbname=TestDB',
        $username,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    echo "データベースに接続できません。".$e->getMessage();
    exit;
}
//テーブルを作成する
$create_query = <<< __SQL__
CREATE TABLE IF NOT EXISTS items (
item_id INTEGER,
name TEXT,
price INTEGER
);
__SQL__;
$result = $db->exec($create_query);
if ($result === false) {//エラーがあれば表示
    print_r($db->errorInfo()); exit;
}
$db->exec("DELETE FROM items");//以前挿入したことがあれば一度初期化
//データを挿入
$idata = array(
    array("item_id"=>1, "name"=>"バナナ", "price"=>150),
    array("item_id"=>2, "name"=>"イチゴ", "price"=>300),
    array("item_id"=>3, "name"=>"イクラ", "price"=>270),
    array("item_id"=>4, "name"=>"カツオ", "price"=>980),
    array("item_id"=>5, "name"=>"タマゴ", "price"=>210),
);
foreach ($idata as $i) {
    //挿入する値をクォートする
    $item_id = intval($i["item_id"]);
    $name = $db->quote($i["name"]);
    //文字列にクオートを('...')足す
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
</pre>