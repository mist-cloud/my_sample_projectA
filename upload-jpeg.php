<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>画像をアップロード</title>
</head>
<body>
あああ

<?php
//ファイルがアップロードされたか調べる
if (isset($_FILES["upfile"])) {
    save_jpeg();
} else {
    show_form();
}
//ファイルのアップロードフォームの表示
function show_form() {
    $self = $_SERVER["SCRIPT_NAME"];
    $maxsize = 1024 * 1024 * 3;//3MB
    echo <<< __FORM__
<form action="$self" method="POST" enctype="multipart/form-data">
JPEGファイルをアップロード：<br/>
<!-- 最大ファイルサイズ（バイト）の指定 -->
<input type="hidden" name="MAX_FILE_SIZE" value="$maxsize" />
<!-- アップロードの指定 -->
<input type="file" name="upfile" /><br/>
<input type="submit" value="ファイル送信" />
</form>
__FORM__;
}
//アップロードされたファイルを保存する
function save_jpeg() {
    //ファイルのパスを指定する
    $tmp_file = $_FILES["upfile"]["tmp_name"];
    $save_file = dirname(__FILE__).'/test.jpeg';
    //指定ファイルがアップロードされたものかチェック
    if (!is_uploaded_file($tmp_file)) {
        echo "アップロードされたファイルが不正です。";
        exit;
    }
    //アップロードされたファイルの形式を調べる
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $type = finfo_file($finfo,$tmp_file);
    if ($type != "image/jpeg") {
        echo "送信されたファイルがJPEGではありません。";
        exit;
    }
    //ファイルを指定ディレクトリに保存
    if (!move_uploaded_file($tmp_file, $save_file)) {
        echo "アップロードに失敗しました。";
        exit;
    }
    //アップした画像を表示する
    echo "<h1>画像ファルをアップしました！！</h1>";
    echo "<img src='test.jpeg' />";
    echo "<div>アイウエオ</div>";
}
?>

いいいい
</body>
</html>