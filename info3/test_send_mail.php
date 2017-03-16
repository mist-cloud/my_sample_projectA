<?php
if (isset($_P0ST["name"]) && isset($_POST["mail"]) && isset($_POST["body"])) {
    //カレントの言語を日本語にする
    mb_language("ja");
    mb_internal_encoding("UTF-8");

    //設定
    $mailTo = "junji_yoshida@sunday-ja.com";
    $subject = $_POST['name'];
    $message = $_POST['mail'] . "\r\n";
    $message .= $_POST['body'];
    $dir = '/';
    $file = 'test.jpeg';
    $filename = $dir.$file;

    //文字コード変換
    $subject = mb_convert_encoding($subject,"ISO-2022-JP-MS","UTF-8");
    $message = mb_convert_encoding($message,"ISO-2022-JP-MS","UTF-8");

    $header = "From:" . $_POST['mail'] . "\r\n";
    $header .= "MIME-Version:1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"\r\n";
    $header .= "\r\n";

    $body = "--__PHPRECIPE__\r\n";
    $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\r\n";
    $body .= "\r\n";
    $body .= $message . "\r\n";
    $body .= "--__PHPRECIPE__\r\n";

    //添付ファイルへの処理
    $handle = fopen($filename, 'r');//ファイルまたはURLをオープンにする。'r'は読み込み、書き出し用でオープンします。
    $attachFile = fread($handle, filesize($filename));
    fclose($handle);
    $attachEncode = base64_encode($attachFile);

    $body .= "Content-Type:image/jpeg; name=\"$file\"\r\n";
    $body .= "Content-transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$file\"\r\n";
    $body .= chunk_split($attachEncode). "\r\n";
    $body .= "--__PHPRECIPE__--\r\n";

    //メールを送信
    mb_send_mail($mailTo, $subject, $message, $header);
    echo "送信しました。";
}
?>

<h3>フォームに入力された情報とファイルをメールで送付</h3>
<form action="test_send_mail.php" method="POST" enctype="multipart/form-data">
<div>
名前:<input type="text" name="name" size="10" /><br />
メール:<input type="text" name="mail" size="25" /><br />
本文:<input type="text" name="body" size="40" /><br />

ファイル：<input type="hidden" name="" />
<input type="file"  name="upfile" /><br />

<input type="submit" value="送信" />
<input type="reset" value="リセット" />
</div>
</form>