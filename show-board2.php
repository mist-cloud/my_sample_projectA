<!-- メッセージを表示するプログラム -->
<h1>店主による本日の一言</h1>
<?php
//ファイルの保存先を指定しているphpファイルを読み込む
include 'setting.inc.php';
//ファイルがあるか？
if (!file_exists($save_file)) {
    echo "まだメッセージはありません";
    exit;
}
//メッセージを読み込んで画面に表示
$msg = file_get_contents($save_file);
//(重要)HTMLに変換する
$msg_html = htmlspecialchars($msg);
//改行を<br>に変換する
$msg_html = str_replace("\n", "<br />", $msg_html);
//HTMLを表示
echo <<< __HTML__
<div style="border: dashed 3px red; padding:12px;">
<div style="font-size:26px; color:blue;">
    {$msg_html}
</div></div>
__HTML__;
?>