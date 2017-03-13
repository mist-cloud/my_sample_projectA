<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$from = "junji_yoshida@sunday-ja.com";//送信者
$to = "junji_yoshida@sunday-ja.com";//メールをもらう人。
$header = "From: $from\n";
$header .= "Reply-To: $from";
$subject = "メールのテスト";
$body = "　こんにちは。メールのテストです。　";
$r = mb_send_mail($to, $subject, $body, $header);
if ($r) { echo "メール送信成功"; } else { echo "失敗"; }
?>
