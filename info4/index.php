<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");
if (isset($_POST["subject"])) {
    $to = mb_encode_mimeheader(mb_convert_encoding("吉田潤二","JIS","UTF8"))."<junji_yoshida@sunday-ja.com>";
    $from = $_POST['mail'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $success = mb_send_mail($to,$subject,$body, "From:" .$from);
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
    <title>フォームに入力した情報とファイルをメースrで送信する。</title>
</head>
<h1>フォームに入力した情報とファイルをメースrで送信する。</h1>
<body>
    <form action="" method="post">
        件名：<input type="text" name="subject" /><br />
        本文：<input type="text" name="body" /><br />
        mail：<input type="text" name="mail" /><br />
        <input type="submit" value="送信" />
    </form>
</body>
</html>

