<?php
/*追加実装の参考　http://rinknowledge.rindomain.com/index.php?title=%E6%B7%BB%E4%BB%98%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E4%BB%98%E3%81%8D%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%AE%E9%80%81%E4%BF%A1　*/
//MySQQLへの接続
$dsn = 'mysql:dbname=TestDB;host=localhost';
$user = 'root';
$password = 'root';
try{
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e){
    echo('データベースに接続できません。'.$e->POSTMessage()); exit;
}

// チャットログのテーブル定義
$create_query = "CREATE TABLE IF NOT EXISTS chatlog (log_id INTEGER PRIMARY KEY AUTO_INCREMENT, name TEXT, body TEXT, mail TEXT, ctime INTEGER);";
$db->exec($create_query);

//ファイルの容量を制限
$maxsize = 1024 * 1024 * 1;
// ログの表示
$select_query = "SELECT * FROM chatlog ORDER BY log_id DESC LIMIT 10 OFFSET 0";
$stmt = $db->query($select_query);//外部のDBから取り出した配列を$stmtに代入
foreach ($stmt as $row) {//配列変数$stmtの要素を１つずつ$rowに入れてある分だけ繰り返す
    $name = htmlspecialchars($row["name"]);
    $body = htmlspecialchars($row["body"]);
    $mail = htmlspecialchars($row["mail"]);
    $ctime = date("H:i:s", $row["ctime"]);
    echo "<div class='log'>送信時間【 {$ctime} 】送信者: {$name}さん　メール: {$mail}　本文「{$body}」</div>";
}

// &&【どちらの変数もセットされている時に中身を実行】→||【nameとbodyのどちらかが未記入の場合の処理を先に書いてる】
if (isset($_POST["name"]) && isset($_POST["body"]) && isset($_POST["mail"])) {
    if ($_POST["name"] == "" || $_POST["body"] == "" || $_POST["mail"] == "") {// 入力の検証
        echo "<p>名前とメールアドレス、本文は必ず入力、アップしたい画像を選択してね。</p>"; exit;
    }
    // データベースに挿入-----------------------------------------
    $template = "INSERT INTO chatlog (name,body,mail,ctime)".
                "VALUES(?,?,?,?);";
    //->アロー演算子は左辺から右辺を取り出す。
    $stmt = $db->prepare($template);//chatlogテーブルに送るSQL文の準備をしている
    $stmt->execute(array($_POST["name"],$_POST["body"],$_POST["mail"], time()));//prepareで準備、executeで配列をprepareに。
    //アップロードされたファイルを保存------------------------------
    function save_jpeg() {
        //ファイルのパスを指定する
        global $save_file;//ローカル変数をグローバル化している
        $tmp_file = $_FILES["upfile"]["tmp_name"];//
        $save_file = dirname(__FILE__).'/'. time() .'.jpeg';//dirname(__FILE__)で自身がいるディレクトリの絶対パスを取得。そこにtest.jpegというファイル名で保存する
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
        echo "<img src='" . time() . ".jpeg' /><br />";
        //exit;
    }
    save_jpeg();
    //メールで情報を送信-----------------------------------------
    //マルチバイト文字の指定
    mb_language("Japanese");//emailメッセージのエンコーディングをjapaneseに設定
    mb_internal_encoding("UTF-8");//内部文字エンコーディングをUTF-8に設定
    //文字コード変換
    //$subject = mb_convert_encoding($subject,"ISO-2022-JP-MS","UTF-8");//文字エンコーディングを変換
    //$body = mb_convert_encoding($body,"ISO-2022-JP-MS","UTF-8");//文字エンコーディングを変換
    
    $to = "junji_yoshida@sunday-ja.com";//フォームからメールを受け取るメルアド
    $subject = $_POST["name"];//名前
    $file = $_FILES["upfile"];//$_FILES["upfile"]は配列情報
    $upfile = $file["tmp_name"];//ここ重要。上記の配列情報から["tmp_name"]のみを使用。アップされたファイルが保存されているテンポラリーファイルの名前
    
    //header
    $from = $_POST["mail"];//フォームで記入したメルアド
    $header = "From: $from\r\n";
    //$header .= "Reply-To: $from";//返信先を指定する場合は必要
    $header .= "MIME-Version: 1.0\r\n";//header部分での改行は\r\nで行う
    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";//ここ重要！！！添付ファイルありの場合、Content-Type: multipart/mixedになり、
    //boundaryで指定した文字列__PHPRECIPE__を区切り線として使う。--__PHPRECIPE__で始まり、--__PHPRECIPE__--で終わるように。
    //$header .= "\r\n";この空の改行が悪さをしている。header内では無駄な改行しない。サンプルで紹介されていたページでは多分PHPのバージョンが古いので動作していたようだ。
    
    $body = "--__PHPRECIPE__\r\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
    $body .= "\r\n";
    $body .= $_POST["body"] . "\r\n";
    $body .= "--__PHPRECIPE__\r\n";
    
    //添付ファイルへの処理
    $handle = fopen($save_file, 'r');//ファイルまたはURLをオープンにする。"r"は読み込みのみ。
    $attachFile = fread($handle, filesize($save_file));//fread()でファイルをバイナリモードで読み込む。バイナリデータとは文字データ以外のデータ形式。
    fclose($handle);//オープンされたファイルポインタをクローズする
    $attachEncode = base64_encode($attachFile);//上記のfreadで画像が文字データとして読み込まれたものをbase64でエンコード。バイナリデータが生き残れるように設計されているようです。
    
    $body .= "Content-type: image/jpeg; name=\"" . time() . ".jpeg\"\r\n";//ここにもファイル名と拡張子を指定。
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition:attachment;filename=\"" . time() . ".jpeg\"\r\n";//ここでファイル名と拡張子を指定。拡張をつけないとファイルが開けない。
    $body .= "\r\n";
    $body .= chunk_split($attachEncode) . "\r\n";//上記のbase64_encode()で文字データ化されたバイナリデータを、chunk_splitで出力変換（RFC 2045の規約）。文字列をより小さな部分に分割する。
    $body .= "--__PHPRECIPE__--\r\n";
    
    //mb_send_mailで送信
    $r = mb_send_mail($to,$subject,$body,$header);//mb_send_mail(送信先,件名,本文,ヘッダ[from含む])
    if ($r) { echo "メール送信成功"; } else { echo "失敗";}
    echo "<a href='index.php'>戻る</a>";
    exit;
}
?>
<h3>DBに書き込み＆画像を所定のディレクトリに保存</h3>
<form action="index.php" method="POST" enctype="multipart/form-data">
<div id="chatform">
名前:<input type="text" name="name" size="10" />
メール:<input type="text" name="mail" size="25" />
本文:<input type="text" name="body" size="40" />
ファイル：<input type="hidden" name="MAXFILE_SIZE" value="<?php echo($maxsize) ?>" />
<input type="file"  name="upfile" />
<input type="submit" value="書込" />
<input type="reset" value="リセット" />
</div>
</form>