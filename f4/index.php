<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHPテスト</title>
</head>

<body>
<h1>ファイルをアップロードする</h1>

<form action="index2.php" method="post" enctype="multipart/form-data">
<dl>
    <dt>写真</dt>
    <dd>
    <!-- ↓写真を参照するボタン -->
    <input name="my_img" type="file" id="my_img" size="50" />
    </dd>
</dl>
<input type="submit" value="送信する" />
</form>

</body>
</html>
