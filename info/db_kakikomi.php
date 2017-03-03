<pre>
<h1>フォームに入力した情報をMySQLに保存させたい！</h1>
<!-- $selfを下記のphpに渡したい -->
<form action="$self" method="post" enctype="multipart/form-data">
名前：<input type="text" name="name" /><br />
メール：<input type="text" name="mail" />     
</form>

</pre>

<?php
//フォームで入力されたテキストをMySQLに保存するテスト。277ページのソースをベースにしている。

//MySQQLへの接続
$dsn = 'mysql:dbname=TestDB;host=localhost';
$user = 'root';
$password = 'root';
try{
    $db = new PDO($dsn, $user, $password);
    echo('接続に成功しました。<br>');//接続成功したら表示される
}catch (PDOException $e){
    echo('データベースに接続できません。'.$e->getMessage());//接続失敗で表示される
    exit;
}
//テーブルに情報を挿入したい idは自動でやりたい
$insert_query = <<< __SQL__
INSERT INTO customer (name, mail)
VALUES (
name TEXT,
mail TEXT
);
__SQL__;
$result = $db->exec($insert_query); //SQLを実行
if ($result == false) {
    print_r($db->errorInfo()); exit;
}
$db->exec("DELETE FROM customer"); //以前挿入していれば一度初期化
//データを挿入 ここにフォームからの値を何とかして代入してINSERTさせたいが、どうやるんだろう？
/*$idata = array(
    array("name"=>"田中太郎", "mail"=>"tanaka@gmail.com"),
    array("name"=>"木村二郎", "mail"=>"kimura@gmail.com"),
    array("name"=>"加藤三郎", "mail"=>"kato@gmail.com")
);
foreach ($idata as $i) {
}*/

"name" = $name;
"mail" = $mail;
?>