<?php
/*追加実装の参考　http://rinknowledge.rindomain.com/index.php?title=%E6%B7%BB%E4%BB%98%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E4%BB%98%E3%81%8D%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%AE%E9%80%81%E4%BF%A1　*/

// &&【どちらの変数もセットされている時に中身を実行】→||【nameとbodyのどちらかが未記入の場合の処理を先に書いてる】
if (isset($_POST["name"]) && isset($_POST["body"]) && isset($_POST["mail"])) {
    if ($_POST["name"] == "" || $_POST["body"] == "" || $_POST["mail"] == "") {// 入力の検証
        echo "<p>名前とメールアドレス、本文は必ず入力、アップしたい画像を選択してね。</p>"; exit;
    }
    //メールで情報を送信-----------------------------------------
    //マルチバイト文字の指定
    mb_language("Japanese");//emailメッセージのエンコーディングをjapaneseに設定
    mb_internal_encoding("UTF-8");//内部文字エンコーディングをUTF-8に設定
    //文字コード変換
    //$subject = mb_convert_encoding($subject,"ISO-2022-JP-MS","UTF-8");//文字エンコーディングを変換
    //$body = mb_convert_encoding($body,"ISO-2022-JP-MS","UTF-8");//文字エンコーディングを変換
    
    $to = "junji_yoshida@sunday-ja.com";//フォームからメールを受け取るメルアド
    $subject = $_POST["name"];//名前
    $file = $_FILES["upfile"];//$_FILES["upfile"]は配列情報。
    //print_rで出力すると、Array ( [name] => dokin.jpeg [type] => image/jpeg [tmp_name] => /Applications/MAMP/tmp/php/phprUPwk8 [error] => 0 [size] => 10041 )
    //↓その中から[tmp_name]の情報だけ引っ張り出す。
    $upfile = $file["tmp_name"];//ここ重要！アップロードされたファイルが保存されているテンポラリーファイルの名前
    
    //header
    $from = $_POST["mail"];//フォームで記入したメルアド
    $header = "From: $from\r\n";
    $header .= "MIME-Version: 1.0\r\n";//header部分での改行は\r\nで行う
    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";//ここ重要！！！添付ファイルありの場合、Content-Type: multipart/mixedになり、
    //boundaryで指定した文字列__PHPRECIPE__を区切り線として使う。--__PHPRECIPE__で始まり、--__PHPRECIPE__--で終わるように。
    //$header .= "\r\n";この空の改行が悪さをしている。サンプルで紹介されていたページでは多分PHPのバージョンが古いので動作していたようだ。
    
    $body = "--__PHPRECIPE__\r\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
    $body .= "\r\n";
    $body .= $_POST["body"] . "\r\n";
    $body .= "--__PHPRECIPE__\r\n";
    
    //添付ファイルへの処理
    $handle = fopen($upfile, 'r');//ファイルまたはURLをオープンにする。"r"は読み込みのみ。
    $attachFile = fread($handle, filesize($upfile));//fread()でファイルをバイナリモードで読み込む。バイナリデータとは文字データ以外のデータ形式。
    fclose($handle);//オープンされたファイルポインタをクローズする
    $attachEncode = base64_encode($attachFile);//上記のfreadで画像が文字データとして読み込まれたものをbase64でエンコード。バイナリデータが生き残れるように設計されているようです。
    
    $body .= "Content-type: image/jpeg; name=\"" . time() . "\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition:attachment;filename=\"" . time() . ".jpeg\"\r\n";//ここでファイル名と拡張子を指定。
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
<h3>メールに画像を添付して送る。</h3>
<form action="test.php" method="POST" enctype="multipart/form-data">
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