<?php
//mb_language("Japanese");
//mb_internal_encoding("UTF-8");
//$from   =   "256hunter@gmail.com";
//$to     =   "256hunter@gmail.com";
//$hd     =   "From: $from\n" ."Reply-To: $from";
//mb_send_mail($to, "test", "test", $hd);

//言語と文字エンコーディングを正しくセット
mb_language("Japanese");
mb_internal_encoding("UTF-8");
//送信者と宛先をセット
$from   =   "256hunter@gmail.com"; //送信者
$to     =   "256hunter@gmail.com"; //宛先
//メールヘッダを作成
$header  =  "From: $from\n";
$header .=  "Reply-To: $from";
//件名や本文をセット
$subject = "メールのテスト";
$body = " こんにちは。メールの送信テストです。 ";
//日本語メールの送信
$r = mb_send_mail($to, $subject, $body, $header);
if ($r) { echo "メール送信成功！"; } else { echo "失敗しました！"; }
?>