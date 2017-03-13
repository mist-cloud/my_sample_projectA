<?php
/*$file = "test.jpg";
$f = finfo_open(FILEINFO_MIME_TYPE);//ファイル形式MIMEタイプを判別
$type = finfo_file($f, $file);//ファイル形式MIMEタイプを判別
echo "$file --- $type";*/
?>

<?php

if (isset($_FILES["upfile"])) {
    save_jpeg();
} else {
    show_form();
}

function show_form() {
    $self = $_SERVER["SCRIPT_NAME"];
    $maxsize = 1024 * 1024 * 2;//pho.iniを調べたら32MBだった
    echo <<< __FORM__
<h1>画像をアップするだけ</h1>
<form action="$self" method="POST" enctype="multipart/form-data">
JPEGデータをアップロード：<br />
<input type="hidden" name="MAX_FILE_SIZE" value="$maxsize" />
<input type="file" name="upfile" /><br />
<input type="submit" value="ファイル送信" />
</form>
__FORM__;
}
//アップロードされたファイルを保存する
function save_jpeg() {
    //ファイルのパスを指定する
    $tmp_file = $_FILES["upfile"]["tmp_name"];
    $save_file = dirname(__FILE__).'/test.jpeg';
    //指定ファイルがアップロードされたものかチェックする
    if (!is_uploaded_file($tmp_file)) {
        echo "アップロードされたファイルが不正です";
        exit;
    }
    //アップロードされたファイルの形式を調べる
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $type = finfo_file($finfo,$tmp_file);
    if ($type != "image/jpeg"){
        echo "送信されたファイルがJPEGではありません。";
        exit;
    }
    //ファイルを指定ディレクトリに保存
    if (!move_uploaded_file($tmp_file, $save_file)) {
        echo "アップロードに失敗しました。";
        exit;
    }
    //アップした画像を表示する
    echo "<h1>画像をアップしました！</h1>";
    echo "<img src='test.jpeg' />";
}
/*print_r($type);
exit;*/
?>
