<?php
mb_language("japanese");
mb_internal_encoding("UTF8");

if (isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    $from = mb_encode_mimeheader(mb_convert_encoding("吉田潤二","JIS","UTF8"))."<256hunter@gmail.com>";
    
    $success = mb_send_mail($to,$subject,$body,"From:".$from);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>メールを送信</h1>
<?php
    if($success) {
        print('送信しました');
    } else {
        print('送信に失敗しました');
    }
?>
</body>
</html>
