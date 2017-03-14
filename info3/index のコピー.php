<?php
$script_name = $_SERVER["SCRIPT_NAME"];
//MySQQLへの接続
$dsn = 'mysql:dbname=TestDB;host=localhost';
$user = 'root';
$password = 'root';
try{
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    echo('データベースに接続できません。'.$e->POSTMessage()); exit;
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

// チャットログのテーブル定義
$create_query = "CREATE TABLE IF NOT EXISTS chatlog (log_id INTEGER PRIMARY KEY, name TEXT, body TEXT, ctime INTEGER);";
$db->exec($create_query);

// &&【どちらの変数もセットされている時に中身を実行】→||【nameとbodyのどちらかが未記入の場合の処理を先に書いてる】
if (isset($_POST["name"]) && isset($_POST["body"])) {
    if ($_POST["name"] == "" || $_POST["body"] == "") {// 入力の検証
        echo "<p>名前と本文は必ず入力、アップしたい画像を選択してね。</p>"; exit;
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
        echo "<h1>入力情報をDBに保存し、画像ファイルをアップしました！</h1>";
        echo "<img src='test.jpeg' /><br />";
        echo "<a href='index.php'>戻る</a>";
        exit;
    }
    save_jpeg();
    /*header("location: $script_name");
    exit();*/
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