<?php
mb_language("Japanese");//日本語でエンコーディング
mb_internal_encoding("UTF-8");//PHPで内部文字をUTF-8でエンコーディング
//ファイルの容量を制限
$maxsize = 1024 * 1024 * 1;//1048576
if (isset($_POST["subject"])) {
    $to = mb_encode_mimeheader(mb_convert_encoding("吉田潤二","JIS","UTF8"))."<junji_yoshida@sunday-ja.com>";
    $from = $_POST['mail'];
    $subject = $_POST['subject'];
    $mailMassage = $_POST['body'];
    $dir = $_FILES['upfile']['tmp_name'];///////////////////////////////////////
    $upfile = $_POST['upfile'];
    $fileName = $dir.$upfile;
    
    $header = "From: $from\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";
    $header .= "\r\n";
    
    $body = "--__PHPRECIPE__\r\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
    $body .= "\r\n";
    $body .= $mailMassage . "\r\n";
    $body .= "--__PHPRECIPE__\r\n";
    
    // 添付ファイルの処理
    $handle = fopen($fileName, 'r');//検証が必要
    $attachFile = fread($handle, filesize($fileName));
    fclose($handle);
    $attachEncode = base64_encode($attachFile);
    $body .= "Content-Type: image/jpeg; name=\"$upfile\"\r\n";//検証が必要
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$upfile\"\r\n";
    $body .= "\r\n";
    $body .= chunk_split($attachEncode) . "\r\n";
    $body .= "--__PHPRECIPE__--\r\n";
    
    //メールの送信と結果の判定をします。セーフモードがOnの場合は第5引数が使えません。
    if (ini_get('safe_mode')) {
        $success = mb_send_mail($to,$subject,$body, "From:" .$header);   
    } else {
        $success = mb_send_mail($to,$subject,$body, "From:" .$header, '-f' . $from);
    }
    if ($success) {
        print('送信しました。');  
    } else {
        print('送信失敗');
    }
}
?>

<!DOCTYPE HTML>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>フォームに入力した情報とファイルをメールで送信する。</title>
</head>
<h1>フォームに入力した情報とファイルをメールで送信する。</h1>
<body>
    <form action="" method="post">
        件名：<input type="text" name="subject" /><br />
        本文：<input type="text" name="body" /><br />
        mail：<input type="text" name="mail" /><br />
        ファイル：<input type="hidden" name="MAXFILE_SIZE" value="<?php echo($maxsize) ?>" />
        <input type="file"  name="upfile" />
        <input type="submit" value="送信" />
    </form>
</body>
</html>

