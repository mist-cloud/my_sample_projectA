<?php
//日本語を使用できるように設定
mb_language("ja");
mb_internal_encoding("UTF-8");
if (isset($_POST["email"])){
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    $from = mb_encode_mimeheader(mb_convert_encoding("吉田潤二","JIS","UTF8"))."<junji_yoshida@sunday-ja.com>";
    $success = mb_send_mail($to,$subject,$body,"From:" .$from);
        if ($success) {
        print('送信しました');
        } else {
        print('送信失敗');
        }
}
?>

<form action="mb_send_mail.php" method="post">
    <dl>
        <dt>送信先(To)</dt>
        <dd><input name="email" type="text" id="email" size="50" maxlength="255" /></dd>
        <dt>サブジェクト</dt>
        <dd><input name="subject" type="text" id="subject" size="50" maxlength="255" /></dd>
        <dt>内容</dt>
        <dd><textarea name="message" id="message" cols="50" rows="10"></textarea></dd>
    </dl>
    <input type="submit" value="送信する" />
</form>