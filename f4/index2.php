<?php
$file = $_FILES['my_img'];

// 連想配列の中身を表示する
print('ファイル名（name）：' . $file['name'] .  '<br />');
print('ファイルタイプ（type）：' . $file['type'] . '<br />');
print('アップロードしたファイル（tmp_name）：' . $file['tmp_name'] . '<br />');
print('エラー内容（error）：' . $file['error'] . '<br />');
print('サイズ（size）：' . $file['size'] . '<br />');

// ファイルアップロードの処理をする
$ext = substr($file['name'], -3); // 後ろから3文字切り取って拡張子を抜き出す
if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png') {
    $filePath = './user_img/' . $file['name']; // 任意の場所を指定できる
    move_uploaded_file($file['tmp_name'], $filePath);
    print('<img src="' . $filePath . '" />');
} else {
    print('※拡張子が.gif, .jpg, .pngのいずれかのファイルをアップロードしてください');
}
?>