<?php
// 言語と文字エンコーディングを正しくセット
mb_language("Japanese");
mb_internal_encoding("UTF-8");
// 送信者と宛先をセット
$from = "***@yahoo.co.jp";  // 送信者 Yahoo!を使うときは重要
$to   = "***@gmail.com";    // 宛先
// メールヘッダを作成
$header  = "From: $from\n";
$header .= "Reply-To: $from";
// 件名や本文をセット
$subject = "メールのテスト";
$body = " こんにちは。メール送信のテストです。";
// 日本語メールの送信
$r = mb_send_mail($to, $subject, $body, $header);
if ($r) { echo "メール送信成功!"; } else { echo "失敗!"; }