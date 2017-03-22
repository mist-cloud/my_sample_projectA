<?php
/*参考：　http://rinknowledge.rindomain.com/index.php?title=%E6%B7%BB%E4%BB%98%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E4%BB%98%E3%81%8D%E3%83%A1%E3%83%BC%E3%83%AB%E3%81%AE%E9%80%81%E4%BF%A1*/
mb_language("ja");//カレントの言語を日本語にする
mb_internal_encoding("UTF-8");//内部文字エンコードを設定

//設定
$mailTo = "junji_yoshida@sunday-ja.com";//送信先アドレス
$subject = "件名テスト";//件名
$message = "本文テスト";//本文
$dir = './img/';//添付ファイルのディレクトリパス
$file = 'jjjj.jpeg';//添付ファイルのファイル名
$filename = $dir.$file;//パスとファイル名を結合

//文字コードを変換
$subject = mb_convert_encoding($subject,"ISO-2022-JP-MS","UTF-8");
$message = mb_convert_encoding($message,"ISO-2022-JP-MS","UTF-8");

$header = "From: junji_yoshida@sunday-ja.com";
$header .= "MIME-Version: 1.0";
$header .= "Content-Type: multipart/mixed; boundary=\"__PHPRECIPE__\"";

$body = "--__PHPRECIPE__";
$body .= "Content-Type: text/Plain; charset=\"ISO-2022-JP\"";
$body .= $message;
$body .= "--__PHPRECIPE__";

//添付ファイルへの処理
$handle = fopen($filename, 'r');
$attachFile = fread($handle, filesize($filename));
fclose($handle);
$attachEncode = base64_encode($attachFile);

$body .= "Content-Type: image/jpeg; name=\"$file\"";
$body .= "Content-Transfer-Encoding: base64";
$body .= "Content-Disposition: attachment; filename=\"$file\"";
$body .= chunk_split($attachEncode);
$body .= "--__PHPRECIPE__--";

//メール送信
$success = mb_send_mail($mailTo,$subject,$body,$header);
if ($success) {
        print('送信しました。');  
    } else {
        print('送信失敗');
    }
?>