<?php
$script_name = $_SERVER["SCRIPT_NAME"];//このスクリプトのパス。このプログラムは単一ファイルのため、受け取る側のファイルも同じファイル。$_SERVER['PHP_SELF']とともに重宝します。


//MySQQLへの接続
$dsn = 'mysql:dbname=TestDB;host=localhost';
$user = 'root';
$password = 'root';
try{
    //tryの中でエラーが発生したらcatchの中を実行する
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    //$e->POSTMessage()で、どうして接続できなかったのか理由を取得する。exit()は、()内に記載したメッセージを表示し現在のスクリプトを終了する。メッセージがなければ括弧なしでコールできる。
    echo('データベースに接続できません。'.$e->POSTMessage()); exit;
}
// チャットログのテーブル定義
//IF NOT EXISTS chatlogは、chatlogテーブルが存在しない時にのみテーブルを作成する。

//ヒアドキュメントじゃなくて""、''でもない書き方で
$create_query = "CREATE TABLE IF NOT EXISTS chatlog (log_id INTEGER PRIMARY KEY, name TEXT, body TEXT, ctime INTEGER);";
//exec()は引数に指定したコマンドを実行。実行結果を引数に指定した配列に格納する。
//クラスメソッドから静的でないプロパティにアクセスするには -> (オブジェクト演算子) を使う
//外部からのメソッドのアクセスは以下のようになる。
//$オブジェクト変数->メソッド名
$db->exec($create_query);

// &&【どちらの変数もセットされているか】→||【nameとbodyのどちらかが未記入の場合】
if (isset($_POST["name"]) && isset($_POST["body"])) {
    if ($_POST["name"] == "" || $_POST["body"] == "") {// 入力の検証
        echo "<p>名前と本文は必ず入力してね。</p>"; exit;
    }
    // データベースに挿入
    $template = "INSERT INTO chatlog (name,body,ctime)".
                "VALUES(?,?,?);";
    //->アロー演算子は左辺から右辺を取り出す。
    $stmt = $db->prepare($template);//chatlogテーブルに送るSQL文の準備をしている
    $stmt->execute(array($_POST["name"],$_POST["body"], time()));//prepareで準備、executeで配列をprepareに。
    //header("location: $script_name");//headerよりも前にechoで表示させてはいけない。よく調べる。
    //アップロードされたファイルを保存
    function save_jpeg() {
    //ファイルのパスを指定する
    $tmp_file = $_FILES["upfile"]["tmp_name"];//
    $save_file = dirname(__FILE__).'/test.jpeg';//dirname(__FILE__)で自身がいるディレクトリの絶対パスを取得。そこにtest.jpegというファイル名で保存する
    //指定ファイルがアップロードされたものかチェック
    if(!is_uploaded_file($tmp_file)){
        echo "アップロードされたファイルが不正です。";
        exit;
    }
//アップロードされたファイルの形式を調べる
    $finfo = finfo_open(FILEINFO_MIME_TYPE);//ファイルのMIME形式
    $type = finfo_file($finfo,$tmp_file);//
    if ($type != "image/jpeg") {
        echo "送信されたファイルがJPEGではありません。";
        exit;
    }
    //ファイルを指定ディレクトリに保存//ここでテンポラリーファイルから、dirnameで指定したディレクトリに指定したファイル名で保存する。
    if (!move_uploaded_file($tmp_file, $save_file)) {/////////
        echo "アップロード失敗しました";
        exit;
    }
    //アップした画像を表示する
    echo "<h1>画像をファイルにアップしました</h1>";
    echo "<img src='test.jpeg' />";
    exit;
    }
    save_jpeg();
}

//ファイルの容量を制限
$maxsize = 1024 * 1024 * 1;
// ログの表示
$select_query = "SELECT * FROM chatlog ORDER BY log_id DESC LIMIT 10 OFFSET 0";
$stmt = $db->query($select_query);//////
foreach ($stmt as $row) {////////
    $name = htmlspecialchars($row["name"]);
    $body = htmlspecialchars($row["body"]);
    $ctime = date("H:i:s", $row["ctime"]);
    echo "<div class='log'>($ctime) $name &gt; $body</div>";
}
?>
<h3>DBに書き込み＆画像を所定のディレクトリに保存</h3>
<form action="<?php echo($script_name) ?>" method="POST" enctype="multipart/form-data">
<div id="chatform">
名前:<input type="text" name="name" size="8" />
本文:<input type="text" name="body" size="40" />
ファイル：<input type="hidden" name="MAXFILE_SIZE" value="<?php echo($maxsize) ?>" />
<input type="file"  name="upfile" />
<input type="submit" value="書込" />
</div>
</form>
<?php print_r($script_name) ?>
<?php print_r($maxsize) ?>
<?php print_r($script_name) ?>