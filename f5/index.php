<?php
$success = file_put_contents('./news_data/news.txt', '2017-02-12 ホームページをリニューアルしました');
?>

<?php
if ($success) {
    print('<p>ファイルへの書き込みが完了しました。</p>');
} else {
    print('<p>ファイルへの書き込みが失敗しました。ディレクトリの権限などを確認してください。</p>');
}
?>