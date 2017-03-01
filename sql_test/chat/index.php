<?php
$savepath = dirname(__FILE__).'/chatlog.db';//ログの保存先
$script_name = $SERVER["SCRIPT_NAME"];
//データベースへの接続
try {
    $db = new PDO("sqlite:$savepath");
} catch (PDOException $e) {
    echo "接続失敗：".$e->getMessage(); exit;
}
//チャットログのテーブル定義
$create_query = <<< __SQL__
CREATE TABLE IF NOT EXISTS chatlog (
log_id INTEGER PRIMARY KEY,
name TEXT,
body TEXT,
ctime INTEGER
);
__SQL__;
$db->exec($create_query);
//書き込みがあったか？
if (isset($_GET["name"]) && isset($_GET["body"])) {
    if ($_GET["name"] == "" || $_GET["body"] == "") {//入力の検証
        echo "<p>名前と本文は必ず入力してね。</p>"; exit;
    }
    //データベースに挿入
    $template = "INSERT INTO chatlog (name,body,ctime)".
                "VALUES(?,?,?);";
    $stmt = $db->prepare($template);
    $stmt->execute(array($_GET["name"],$_GET["body"], time()));
    header("location: $script_name"); exit;//リロードする
}
//書き込みフォームの表示
echo <<< __FORM__
<link type="text/css" rel="stylesheet" href="chat.css" />
<h3>チャット</h3>
<form action="$script_name" method="GET"><div id="chatform">
名前：<input type="text" name="name" size="8" />
本文：<input type="text" name="body" size="40" />
<input type="submit" value="書込み" /></div>
</form>
__FORM__;
//ログの表示
//$select_query = "SELECT * FROM chatlog ORDER BY log_id DESC";//SELECT *(全てのカラム) FROM テーブル名　ORDER BY（並び替え） log_id順　DESC(逆の降順)
$select_query = "SELECT * FROM chatlog ORDER BY log_id DESC LIMIT 20 OFFSET 3";//LIMIT（表示する件数）OFFSET（指定した数の件数から表示スタート）
$stmt = $db->query($select_query);
foreach ($stmt as $row) {
    $name = htmlspecialchars($row["name"]);
    $body = htmlspecialchars($row["body"]);
    $ctime = date("H:i:s", $row["ctime"]);
    echo "<div class='log'>($ctime) $name &gt; $body</div>";
}
?>